<?php 
include_once 'header-2.php';
?>
<head>
<link rel="stylesheet" type="text/css" href="./assets/vendor/datatables/css/jquery.dataTables.css"/><link rel="stylesheet" type="text/css" href="./assets/vendor/datatables/css/dataTables.semanticui.css"/>
</head>
<body>
	<div class="container-fluid">
		<br><h3>Riwayat Aktivitas Anda</h3><br>
			<table id="table_id" class="display">
				<thead>
					<tr>
						<th>Jabatan</th>
						<th>Tanggal mulai</th>
						<th>Tanggal berakhir</th>
						<th>Nama Kegiatan</th>
						<th>Status Jabatan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				/* @var $row Panitia */
					foreach($result as $row) {
						$akt = $this->aktDaoImplement->fetchDataAktivitas($row->getP_A_Id_kegiatan());
						echo '<tr>';
						echo '<td>' . $row->getJabatan() . '</td>';
						echo '<td>' . date_format(date_create($akt->getTanggalMulai()), 'd M Y') . '</td>';
						echo '<td>' . date_format(date_create($akt->getTanggalSelesai()), 'd M Y') . '</td>';
						echo '<td>' . $akt->getNama_kegiatan() . '</td>';
						$stat = $row->getStatus_jabatan();
						if ($stat==0){
							$status = "Selesai";
						} else {
							$status = "Aktif";
						}
						echo '<td>' . $status . '</td>';
						echo '</tr>';
					}
				?>
				</tbody>
			</table>
	</div>
</body>

 <script>
$(document).ready( function () {
    $('#table_id').DataTable({"dom": '<lf<t>p>',
	"columns": [
        { "width": "25%" },
        { "width": "25%" },
        { "width": "25%" },
        { "width": "25%" },
        { "width": "500px" }
	]});
} );</script>
<?php include 'footer-2.php'; ?>