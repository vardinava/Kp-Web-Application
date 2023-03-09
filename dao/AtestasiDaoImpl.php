<?php
class AtestasiDaoImpl {
	public function insertAtestasi(AtestasiMasuk $atestasi) {
        $link = PDOUtil::openKoneksi();
        try {
            $link->beginTransaction();
            $query = 'INSERT INTO tbl_atestasimasuk (noAtestasi,tglPengajuan,namaLengkap,alamat,email,noTelp,noWA,agama,gerejaAsal,status,pasFoto,scanAkteBaptisSidi,suratKeterangan) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $stmt = $link->prepare($query);
            $stmt->bindValue(1, $atestasi->getNoAtestasi(), PDO::PARAM_STR);
            $stmt->bindValue(2, $atestasi->getTglPengajuan(), PDO::PARAM_STR);
            $stmt->bindValue(3, $atestasi->getNamaLengkap(), PDO::PARAM_STR);
            $stmt->bindValue(4, $atestasi->getAlamat(), PDO::PARAM_STR);
            $stmt->bindValue(5, $atestasi->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(6, $atestasi->getNoTelepon(), PDO::PARAM_STR);
            $stmt->bindValue(7, $atestasi->getNoWA(), PDO::PARAM_STR);
            $stmt->bindValue(8, $atestasi->getAgama(), PDO::PARAM_STR);
            $stmt->bindValue(9, $atestasi->getGerejaAsal(), PDO::PARAM_STR);
            $stmt->bindValue(10, $atestasi->getStatus(), PDO::PARAM_STR);
            $stmt->bindValue(11, $atestasi->getPasFoto(), PDO::PARAM_STR);
            $stmt->bindValue(12, $atestasi->getScanAkteBaptisSidi(), PDO::PARAM_STR);
            $stmt->bindValue(13, $atestasi->getSuratKeterangan(), PDO::PARAM_STR);
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
	
	public function fetchAtestasi(){
		$link = PDOUtil::openKoneksi();
		try {
			$query = "SELECT * FROM tbl_atestasimasuk";
			$stmt = $link->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'AtestasiMasuk');
            $stmt->execute();
        } catch (PDOException $er) {
            echo $er->getMessage();
            die();
		}
		PDOUtil::closeKoneksi($link);
		return $stmt;
	}
	
	public function fetchDataAtestasi($atestasi){
		$link = PDOUtil::openKoneksi();
		$query = "SELECT * FROM tbl_atestasimasuk WHERE idAtestasiM = ? order by tglPengajuan DESC";
		$stmt = $link->prepare($query);
		$stmt->bindParam(1,$atestasi);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt->execute();
		PDOUtil::closeKoneksi($link);
		return $stmt->fetchObject('AtestasiMasuk');
	}
	
	public function fetchUpdateAtestasi(AtestasiMasuk $atestasi_up){
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
}