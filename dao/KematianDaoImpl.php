<?php
class KematianDaoImpl {
	public function insertKematian(Kematian $kematian) {
        $link = PDOUtil::openKoneksi();
        try {
            $link->beginTransaction();
            $query = 'INSERT INTO tbl_kematian (noJemaat,namaJemaat,tglMeninggal,keterangan,lokasiPemakaman,tglPemakaman,yangMelayani) VALUES (?,?,?,?,?,?,?)';
            $stmt = $link->prepare($query);
            $stmt->bindValue(1, $kematian->getNoJemaat(), PDO::PARAM_STR);
            $stmt->bindValue(2, $kematian->getNamaJemaat(), PDO::PARAM_STR);
            $stmt->bindValue(3, $kematian->getTglMeninggal(), PDO::PARAM_STR);
            $stmt->bindValue(4, $kematian->getKeterangan(), PDO::PARAM_STR);
            $stmt->bindValue(5, $kematian->getLokasiPemakaman(), PDO::PARAM_STR);
            $stmt->bindValue(6, $kematian->getTglPemakaman(), PDO::PARAM_STR);
            $stmt->bindValue(7, $kematian->getYangMelayani(), PDO::PARAM_STR);
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
	
	public function fetchKematian(){
		$link = PDOUtil::openKoneksi();
		try {
			$query = "SELECT * FROM tbl_kematian";
			$stmt = $link->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Kematian');
            $stmt->execute();
        } catch (PDOException $er) {
            echo $er->getMessage();
            die();
		}
		PDOUtil::closeKoneksi($link);
		return $stmt;
	}
	
	public function fetchDataKematian($kematian_ID){
		$link = PDOUtil::openKoneksi();
		$query = "SELECT * FROM tbl_kematian WHERE ID_kematian = ? order by tgl_Meninggal DESC";
		$stmt = $link->prepare($query);
		$stmt->bindParam(1,$kematian_ID);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt->execute();
		PDOUtil::closeKoneksi($link);
		return $stmt->fetchObject('Kematian');
	}
}