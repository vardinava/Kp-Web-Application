<?php
	include "PDOUtil.php";
	include "../entity/Aktivitas.php";

	if($_POST["query"] != ''){
		$namaj = $_POST["query"];
		$query = "SELECT * FROM tbl_aktivitas WHERE jenis = '".$namaj."' ORDER BY tanggal_selesai DESC";
	}
	else{
		$query = "SELECT * FROM tbl_aktivitas ORDER BY tanggal_selesai DESC";
	}
	
	$result = fetchFilteredAktivitas($query);

	if(isset($result)){
		$output='';
		foreach($result as $row){
			$output .= '
			<tr>
			<td>'.$row->getNama_kegiatan().'</td>
			<td>'.$row->getTanggalMulai().'</td>
			<td>'.$row->getTanggalSelesai().'</td>
			</tr>
			';
		}
	}
	else{
		$output .= '<tr><td colspan="3" align="center">Tidak ada data</td></tr>';
	}
	echo $output;
	
	function fetchFilteredAktivitas($query){
		$link = PDOUtil::openKoneksi();
		try {
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