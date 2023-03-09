<?php
class KelahiranDaoImpl {
	public function insertKelahiran(Kelahiran $kelahiran) {
        $link = PDOUtil::openKoneksi();
        try {
            $link->beginTransaction();
            $query = 'INSERT INTO tbl_kelahiran (noAkte,namaAyah,namaIbu,namaAnak,jk,tglLahir,goldar,namaPelapor,tglPelapor) VALUES (?,?,?,?,?,?,?,?,?)';
            $stmt = $link->prepare($query);
            $stmt->bindValue(1, $kelahiran->getNoAkte(), PDO::PARAM_STR);
            $stmt->bindValue(2, $kelahiran->getNamaAyah(), PDO::PARAM_STR);
            $stmt->bindValue(3, $kelahiran->getNamaIbu(), PDO::PARAM_STR);
            $stmt->bindValue(4, $kelahiran->getNamaAnak(), PDO::PARAM_STR);
            $stmt->bindValue(5, $kelahiran->getJK(), PDO::PARAM_STR);
            $stmt->bindValue(6, $kelahiran->getTglLahir(), PDO::PARAM_STR);
            $stmt->bindValue(7, $kelahiran->getGoldar(), PDO::PARAM_STR);
            $stmt->bindValue(8, $kelahiran->getNamaPelapor(), PDO::PARAM_STR);
            $stmt->bindValue(9, $kelahiran->getTglPelapor(), PDO::PARAM_STR);
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
	
	public function fetchKelahiran(){
		$link = PDOUtil::openKoneksi();
		try {
			$query = "SELECT * FROM tbl_kelahiran";
			$stmt = $link->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Kelahiran');
            $stmt->execute();
        } catch (PDOException $er) {
            echo $er->getMessage();
            die();
		}
		PDOUtil::closeKoneksi($link);
		return $stmt;
	}
	
	public function fetchDataKelahiran($kelahiran_ID){
		$link = PDOUtil::openKoneksi();
		$query = "SELECT * FROM tbl_kelahiran WHERE ID_kelahiran = ? order by tgl_Lahir DESC";
		$stmt = $link->prepare($query);
		$stmt->bindParam(1,$kelahiran_ID);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt->execute();
		PDOUtil::closeKoneksi($link);
		return $stmt->fetchObject('Kelahiran');
	}
}