<?php
class AktivitasDaoImpl {
	//Data Aktivitas
	public function fetchAktivitas(){
		$link = PDOUtil::openKoneksi();
		try {
			$query = "SELECT * FROM tbl_aktivitas";
			$stmt = $link->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Aktivitas');
            $stmt->execute();
        } catch (PDOException $er) {
            echo $er->getMessage();
            die();
		}
		PDOUtil::closeKoneksi($link);
		return $stmt;
	}
	
	//jumlah aktivitas
	function totalAktivitas() {
        $link = PDOUtil::openKoneksi();
		$query = "SELECT COUNT(id_kegiatan) from tbl_aktivitas";
		$stmt = $link->prepare($query);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt->execute();
		$jum = $stmt->fetchColumn();
		PDOUtil::closeKoneksi($link);
		return $jum;
    }
	function totalAktivitasAcara() {
        $link = PDOUtil::openKoneksi();
		$query = "SELECT COUNT(id_kegiatan) from tbl_aktivitas WHERE jenis='Acara'";
		$stmt = $link->prepare($query);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt->execute();
		$jum = $stmt->fetchColumn();
		PDOUtil::closeKoneksi($link);
		return $jum;
    }
	function totalAktivitasOrg() {
        $link = PDOUtil::openKoneksi();
		$query = "SELECT COUNT(id_kegiatan) from tbl_aktivitas WHERE jenis='Organisasi'";
		$stmt = $link->prepare($query);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt->execute();
		$jum = $stmt->fetchColumn();
		PDOUtil::closeKoneksi($link);
		return $jum;
    }
	
	//1 Data Aktivitas
	public function fetchDataAktivitas($actid){
		$link = PDOUtil::openKoneksi();
		$query = "SELECT * FROM tbl_aktivitas WHERE id_kegiatan = ? order by tanggal_mulai DESC";
		$stmt = $link->prepare($query);
		$stmt->bindParam(1,$actid);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt->execute();
		PDOUtil::closeKoneksi($link);
		return $stmt->fetchObject('Aktivitas');
	}
	//fetch Panitia
	public function fetchDataKepanitiaan($iduser){
		$link = PDOUtil::openKoneksi();
		try {
			$query = "SELECT * FROM tbl_panitia WHERE p_u_id_user = ? order by p_a_id_kegiatan DESC";
			$stmt = $link->prepare($query);
			$stmt->bindParam(1,$iduser);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Panitia');
            $stmt->execute();
        } catch (PDOException $er) {
            echo $er->getMessage();
            die();
		}
		PDOUtil::closeKoneksi($link);
		return $stmt;
	}
}