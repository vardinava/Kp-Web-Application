<?php
	include "PDOUtil.php";
	include "../entity/Aktivitas.php";
	include "../entity/Panitia.php";
	
	//info
	$actid = 0;
	if(isset($_POST['actid'])){
		$actid = $_POST['actid'];
		$results = new Aktivitas();
		$results = fetchDataAktivitas($actid);
		$response = "<table border='0' width='100%'>";
		$response .= "<tr>";
		$response .= "<td>ID Kegiatan : </td><td>".$actid."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Deskripsi Kegiatan : </td><td>".$results->getDeskripsi()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Bukti Surat Keterangan : </td><td><a href='sk/".$results->getSuratKeterangan()."'>Buka file</a></td>";
		$response .= "</tr>";
		
		$response .= "</table>";
		echo $response;
		exit;
	}
	//delete
	$actid = 0;
	if(isset($_POST['del'])){
		$actid = $_POST['del'];
		$res = deleteAktivitas($actid);
		if($res == 1){
			echo "Data berhasil dihapus";  
		}  
		else  
		{  
			echo "Terjadi kesalahan";  
		}  
		exit;
	}
	/**Insert dan Update aktivitas**/
	if(isset($_POST["txtNama"])){
		$namak = filter_input(INPUT_POST,"txtNama");
		$tglm = date('Y-m-d', strtotime(filter_input(INPUT_POST,"tglM")));
		$tgls = date('Y-m-d', strtotime(filter_input(INPUT_POST,"tglS")));
		$deskripsi= filter_input(INPUT_POST,"txtDeskripsi");
		$jenis= filter_input(INPUT_POST,"rdjenis");
		$akt = new Aktivitas();
		$akt->setNama_kegiatan($namak);
		$akt->setTanggalMulai($tglm);
		$akt->setTanggalSelesai($tgls);
		$akt->setDeskripsi($deskripsi);
		$akt->setJenis($jenis);
		
		if($_POST["updating"]!=''){
			if(!empty($_FILES['file'])){
				$targetDirectory = '../sk/';
				$fileExtension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
				$newFileName = $namak . '.' . $fileExtension;
				$targetFile = $targetDirectory.$newFileName;
				$bukti=$newFileName;
				if($_FILES['file']['size']>1024*5012){
					echo '<div class="bg-info">Ukuran file lebih tidak boleh lebih dari 5mb</div>';
				} else {
					move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);
				}
			} else {
				$bukti= $_POST["sket"];
			}
			$akt->setId_kegiatan($_POST["updating"]);
			$akt->setSuratKeterangan($bukti);
			$res = updateAktivitas($akt);
			if($res == 1){
				$msg = "Data berhasil diperbarui";  
			}  
			else{  
				$msg = "Terjadi kesalahan";  
			}
			echo $msg;
		} else {
			if(!empty($_FILES['file'])){
				$targetDirectory = '../sk/';
				$fileExtension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
				$newFileName = $namak . '.' . $fileExtension;
				$targetFile = $targetDirectory.$newFileName;
				$bukti=$newFileName;
				if($_FILES['file']['size']>1024*5012){
					echo '<div class="bg-info">Ukuran file lebih tidak boleh lebih dari 5mb</div>';
				} else {
					move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);
				}
			} else {
				$bukti= 'default.png';
			}

			$akt->setSuratKeterangan($bukti);
			$res = insertAktivitas($akt);
			if($res == 1){
				$msg = "Data berhasil disimpan";  
			}  
			else  
			{  
				$msg = "Terjadi kesalahan";  
			}
			echo $msg;
		}
	}
	
	//update
	if(isset($_POST["updating"])){
	 if($_POST["updating"]!=''){  
			$idup = $_POST["updating"];  
			$a = new Aktivitas();
			$a = fetchDataAktivitas($idup);
			$isi = array("id_kegiatan"=>$a->getId_kegiatan(), "nama_kegiatan"=>$a->getNama_kegiatan(), "tanggal_mulai"=>$a->getTanggalMulai(), "tanggal_selesai"=>$a->getTanggalSelesai(), "deskripsi"=>$a->getDeskripsi(),"sk"=>$a->getSuratKeterangan());
			header("Content-Type: application/json",true);
			echo json_encode($isi);  
		}
	}
	
	
	/****/
	/** Mysql **/
	
	function fetchDataAktivitas($actid){
		$link = PDOUtil::openKoneksi();
		$query = "SELECT * FROM tbl_aktivitas WHERE id_kegiatan = ? order by tanggal_mulai desc";
		$stmt = $link->prepare($query);
		$stmt->bindParam(1,$actid);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt->execute();
		PDOUtil::closeKoneksi($link);
		return $stmt->fetchObject('Aktivitas');
	}
	
	function insertAktivitas(Aktivitas $a){
		$result=0;
		$link = PDOUtil::openKoneksi();
		$query = "INSERT INTO tbl_aktivitas (nama_kegiatan,deskripsi,jenis,tanggal_mulai,tanggal_selesai,surat_keterangan) VALUES (?,?,?,?,?,?)";
		$stmt = $link->prepare($query);
		$stmt->bindValue(1,$a->getNama_kegiatan());
		$stmt->bindValue(2,$a->getDeskripsi());
		$stmt->bindValue(3,$a->getJenis());
		$stmt->bindValue(4,$a->getTanggalMulai());
		$stmt->bindValue(5,$a->getTanggalSelesai());
		$stmt->bindValue(6,$a->getSuratKeterangan());
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
	
	function updateAktivitas(Aktivitas $a){
		$result=0;
		$link = PDOUtil::openKoneksi();
		$query = "UPDATE tbl_aktivitas SET nama_kegiatan=?,deskripsi=?,jenis=?,tanggal_mulai=?,tanggal_selesai=? WHERE id_kegiatan=?";
		$stmt = $link->prepare($query);
		$stmt->bindValue(1,$a->getNama_kegiatan());
		$stmt->bindValue(2,$a->getDeskripsi());
		$stmt->bindValue(3,$a->getJenis());
		$stmt->bindValue(4,$a->getTanggalMulai());
		$stmt->bindValue(5,$a->getTanggalSelesai());
		$stmt->bindValue(6,$a->getId_kegiatan());
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
	
	function deleteAktivitas($cid){
		$result=0;
		deletePanitia($cid);
		$link = PDOUtil::openKoneksi();
		$query = "DELETE FROM tbl_aktivitas WHERE id_kegiatan = ?";
		$stmt = $link->prepare($query);
		$stmt->bindParam(1,$cid);
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
	
	function deletePanitia($cid){
		$result=0;
		$link = PDOUtil::openKoneksi();
		$query = "DELETE FROM tbl_panitia WHERE P_A_Id_kegiatan = ?";
		$stmt = $link->prepare($query);
		$stmt->bindParam(1,$cid);
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