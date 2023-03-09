<?php 
include_once 'header-2.php';
error_reporting(0); ?>
<head>
<link rel="stylesheet" type="text/css" href="assets/styles/tabel.css">
</head>
	<div class="card-body">
		<h3> PERSETUJUAN ATESTASI KELUAR </h3>
                  <div class="table-responsive">
                    <table class="table">
					<tr>
						<th width="1%">No</th>
						<th width="15%">No Atestasi Keluar</th>
						<th width="15%">Tanggal Pengajuan</th>
						<th width="15%">No Jemaat</th>
						<th width="15%">Nama</th>
						<th width="15%">Gereja Tujuan</th>
						<th width="15%">Status</th>
						<th colspan="2" width="15%">ACTION</th>
					</tr>
					<?php
					/* @var $row Atestasi */
						foreach($result as $row) {
							echo '<tr>';
							echo '<td>' . $row->getIdAtestasiM() . '</td>';
							echo '<td>' . $row->getNoAtestasi() . '</td>';
							echo '<td>' . $row->getTanggalPengajuan() . '</td>';
							echo '<td>' . $row->getNamaLengkap() . '</td>';
							echo '<td>' . $row->getGerejaAsal() . '</td>';
							echo '<td>' . $row->getStatus() . '</td>';
							echo '</tr>';
						}
						$link = null;
					?>
				</table>
			</div>
			</div>
		<div>
<?php include 'footer-2.php'; ?>