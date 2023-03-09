<?php
	include "PDOUtil.php";
	include "../entity/AtestasiMasuk.php";
	
	$atestasi = 0;
	if(isset($_POST['atestasi'])){
		$atestasi = $_POST['atestasi'];
		$results = new AtestasiMasuk();
		$results = fetchDataAtestasi($atestasi);
		$response = "<table border='0' width='100%'>";
		
		
		$response .= "<tr>";
		$response .= "<td>Tanggal Pengajuan : </td><td>".date_format(date_create($results->getTglPengajuan()), 'd-M-Y')."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Nama Lengkap : </td><td>".$results->getNamaLengkap()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Alamat : </td><td>".$results->getAlamat()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Email : </td><td>".$results->getEmail()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>No Telp : </td><td>".$results->getNoTelp()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>No Whatsapp : </td><td>".$results->getNoWA()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Agama : </td><td>".$results->getAgama()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Gereja Asal : </td><td>".$results->getGerejaAsal()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Status : </td><td>".$results->getStatus()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Pas Foto : </td><td>".$results->getPasFoto()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Scan Akte Baptis/Sidi : </td><td>".$results->getScanAkteBaptisSidi()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Surat Keterangan : </td><td>".$results->getSuratKeterangan()."</td>";
		$response .= "</tr>";
		
		$response .= "</table>";
		echo $response;
		exit;
	}
	
	$atestasi_up = 0;
	if(isset($_POST['atestasi_up'])){
		$atestasi_up = $_POST['atestasi_up'];
		$results = new AtestasiMasuk();
		$results = fetchUpdateAtestasi($atestasi_up);
		$response = "<table border='0' width='100%'>";
		$response .= "<tr>";
		$response .= "<td>ID Atestasi: </td><td>".$atestasi_up."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Tanggal Pengajuan : </td><td>".$results->getTglPengajuan()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Nama Lengkap : </td><td>".$results->getNamaLengkap()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Alamat : </td><td>".$results->getAlamat()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Email : </td><td>".$results->getEmail()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>No Telp : </td><td>".$results->getNoTelp()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>No Whatsapp : </td><td>".$results->getNoWA()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Agama : </td><td>".$results->getAgama()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Gereja Asal : </td><td>".$results->getGerejaAsal()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Status : </td><td>".$results->getStatus()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Pas Foto : </td><td>".$results->getPasFoto()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Scan Akte Baptis/Sidi : </td><td>".$results->getScanAkteBaptisSidi()."</td>";
		$response .= "</tr>";
		
		$response .= "<tr>";
		$response .= "<td>Surat Keterangan : </td><td>".$results->getSuratKeterangan()."</td>";
		$response .= "</tr>";
		
		$response .= "</table>";
		echo $response;
		exit;
	}
	
	/** Mysql **/
	
	function fetchDataAtestasi($atestasi){
		$link = PDOUtil::openKoneksi();
		$query = "SELECT * FROM tbl_atestasimasuk WHERE idAtestasiM = ? order by tglPengajuan DESC";
		$stmt = $link->prepare($query);
		$stmt->bindParam(1,$atestasi);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt->execute();
		PDOUtil::closeKoneksi($link);
		return $stmt->fetchObject('AtestasiMasuk');
	}
	
	function fetchUpdateAtestasi(AtestasiMasuk $atestasi_up){
		$link = PDOUtil::openKoneksi();
		try {
			$link->beginTransaction();
			$query = "UPDATE tbl_atestasimasuk SET noAtestasi = ?, tglPengajuan = ?, namaLengkap = ?, alamat = ?, email=?, noTelp=?, noWA=?, agama=?, gerejaAsal=?, status=? pasFoto=?, scanAkteBaptisSidi=?, suratKeterangan=? WHERE idAtestasiM = ?";
			$stmt = $link->prepare($query);
			$stmt->bindValue(1,$atestasi_up->getNoAtestasi(), PDO::PARAM_STR);
			$stmt->bindValue(2, $atestasi_up->getTglPengajuan(), PDO::PARAM_STR);
			$stmt->bindValue(3, $atestasi_up->getNamaLengkap(), PDO::PARAM_STR);
			$stmt->bindValue(4, $atestasi_up->getAlamat(), PDO::PARAM_STR);
			$stmt->bindValue(5, $atestasi_up->getEmail(), PDO::PARAM_STR);
			$stmt->bindValue(6, $atestasi_up->getNoTelepon(), PDO::PARAM_STR);
			$stmt->bindValue(7, $atestasi_up->getNoWA(), PDO::PARAM_STR);
			$stmt->bindValue(8, $atestasi_up->getAgama(), PDO::PARAM_STR);
			$stmt->bindValue(9, $atestasi_up->getGerejaAsal(), PDO::PARAM_STR);
			$stmt->bindValue(10, $atestasi_up->getStatus(), PDO::PARAM_STR);
			$stmt->bindValue(11,$atestasi_up->getPasFoto(), PDO::PARAM_STR);
			$stmt->bindValue(12,$atestasi_up->getScanAkteBaptisSidi(), PDO::PARAM_STR);
			$stmt->bindValue(13, $atestasi_up->getSuratKeterangan(), PDO::PARAM_STR);
			$stmt->bindValue(14,$atestasi_up->getIdAtestasiM(), PDO::PARAM_STR);
			$stmt->execute();
			$msg = 'sukses';
			$link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
	}
	
	
	