<?php
	include "PDOUtil.php";
	include "../entity/Panitia.php";

	//submit panitia
	if(isset($_POST['name']))  
	{   
		$aktid = $_POST["thisId"];
		$numberUser = count($_POST["user"]);
		if($numberUser > 0)
		{  
			$panitia = new Panitia();
			$panitia->setP_A_Id_kegiatan($aktid);
			$panitia->setMasa_berakhir($_POST["thisTgl"]);
			for($i=0; $i<$numberUser; $i++)  
			{  			 
				$rowUser = $_POST["user"][$i];
				$rowJab = $_POST["name"][$i];
				$rowStat = $_POST["status"][$i];
				$panitia->setP_U_Id_user($rowUser);
				$panitia->setJabatan($rowJab);
				$panitia->setStatus_jabatan($rowStat);
				$result = insertPanitia($panitia);
			}
			if($result == 1){
				$msg = "Data Panitia berhasil diatur ";  
			}  
			else  
			{  
				$msg = "Terjadi kesalahan";  
			}
		}
		echo $msg;
	}
		
	//show panitia
	$panid = 0;
	if(isset($_POST['panid'])){
		$panid = $_POST['panid'];
		$results = new Panitia();
		$results = fetchPanitia($panid);
		if(isset($results)){
			$response = "<table border='0' width='100%'>";
			$response .= "<thead>";
			$response .= "<tr>";
			$response .= "<th>Nama</th>";
			$response .= "<th>Jabatan</th>";
			$response .= "<th>Tipe Jabatan</th>";
			$response .= "<th>Hapus</th>";
			$response .= "</tr>";
			$response .= "</thead><tbody>";
			$i = -1;
			/* @var $rowp Panitia */
			foreach($results as $rowp){
				$stat = $rowp->getStatus_jabatan();
				if($stat == 1){
					$keaktifan = "Permanen";
				} else {
					$keaktifan = "Sementara";
				}
				$response .= "<tr id='row".$i."'>";
				$response .= "<td>".getNama($rowp->getP_U_Id_user())."</td>";
				$response .= "<td>".$rowp->getJabatan()."</td>";
				$response .= "<td>".$keaktifan."</td>";
				$response .= '<td><button type="button" name="remover" id="'.$i.'" idpanitia="'.$rowp->getP_U_Id_user().'" class="btn btn-danger btn_remover">X</button></td>';
				$response .= "</tr>";
				$i--;
			}
			$response .= "</tbody></table>";
		} else {
			$response="Data Kepanitiaan / Keanggotaan belum didaftarkan.";
		}
		echo $response;
		exit;
	}
	
	//delete panitia
	$numberDel = count($_POST["tempDel"]);
	if($numberDel > 0){
		$arr = $_POST['tempDel'];
		$delPanitia = implode("','", $arr);
		$aktid = $_POST["thisId"];
		$result = deletePanitia($delPanitia,$aktid);
		if($result == 1){
			$msg = "data berhasil dihapus";  
		}  
		else  
		{  
			$msg = "Terjadi kesalahan";  
		}
		echo $msg;
	}
	
	//mysql
	function insertPanitia(Panitia $p){
		$result=0;
		$link = PDOUtil::openKoneksi();
		$query = "INSERT INTO tbl_panitia (p_a_id_kegiatan,p_u_id_user,jabatan,masa_berakhir,status_jabatan) VALUES (?,?,?,?,?)";
		$stmt = $link->prepare($query);
		$stmt->bindValue(1,$p->getP_A_Id_kegiatan());
		$stmt->bindValue(2,$p->getP_U_Id_user());
		$stmt->bindValue(3,$p->getJabatan());
		$stmt->bindValue(4,$p->getMasa_berakhir());
		$stmt->bindValue(5,$p->getStatus_jabatan());
		$link->beginTransaction();
		if($stmt->execute()){
			$link->commit();
			$result=1;
		} else {
			$link->rollBack();
		}
		PDOUtil::closeKoneksi($link);
		return $result;
	}
	function fetchPanitia($pid){
		$link = PDOUtil::openKoneksi();
		try {
			$query = "SELECT * FROM tbl_panitia WHERE p_a_id_kegiatan = ?";
			$stmt = $link->prepare($query);
			$stmt->bindValue(1, $pid);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Panitia');
            $stmt->execute();
        } catch (PDOException $er) {
            die();
		}
		PDOUtil::closeKoneksi($link);
		return $stmt;
	}
	
	function getNama($iduser) {
        $link = PDOUtil::openKoneksi();
		$query = "SELECT nama from user WHERE id_user = ?";
		$stmt = $link->prepare($query);
		$stmt->bindValue(1, $iduser);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt->execute();
		$nr = $stmt->fetchColumn();
		PDOUtil::closeKoneksi($link);
		return $nr;
    }
	
	function deletePanitia($delPanitia,$idaktivitas){
		$result=0;
		$link = PDOUtil::openKoneksi();
		$query = "DELETE FROM tbl_panitia WHERE P_A_Id_kegiatan = ? AND P_U_Id_user IN ('?')";
		$stmt = $link->prepare($query);
		$stmt->bindParam(1,$idaktivitas);
		$stmt->bindParam(1,$delPanitia);
		$link->beginTransaction();
		if($stmt->execute()){
			$link->commit();
			$result=1;
		} else {
			$link->rollBack();
		}
		PDOUtil::closeKoneksi($link);
		return $result;
	}