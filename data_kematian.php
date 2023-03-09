<?php 
include_once 'header-2.php';
?>
<head>
<link rel="stylesheet" type="text/css" href="./assets/vendor/datatables/css/jquery.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="./assets/vendor/datatables/css/dataTables.bootstrap.css"/>
</head>
<body>
<section class="statistics">
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col-lg-12">
                    <form method="POST" enctype="multipart/form-data">
                </div>
    </section>
	<!--dimasukkin ke modal nnti-->
    <section class="statistics">
        <div class="container-fluid">
            <h3>Form Data Kematian</h3><br>
            <div class="row d-flex">
                <div class="col-lg-12">
                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nomor Jemaat</label>
                        <div class="col-sm-10">
                            <input type="text" name="noJemaat" class="form-control is-valid" placeholder="Masukkan Nomor Jemaat">
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nama Jemaat</label>
                        <div class="col-sm-10">
                            <input type="text" name="namaJemaat" class="form-control is-valid" placeholder="Masukkan Nama Jemaat">
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Tanggal Meninggal</label>
						<div class="col-sm-10">
						   <input type='date' class="form-control is-valid" name="tglMeninggal">
						</div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" name="keterangan" class="form-control is-valid" placeholder="Masukkan Keterangan">
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Lokasi Pemakaman</label>
                        <div class="col-sm-10">
                         <textarea class="form-control is-valid" name="lokasiPemakaman" placeholder="Masukkan Alamat Lokasi"></textarea>
                      </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Tanggal Pemakaman</label>
						<div class="col-sm-10">
						   <input type='date' class="form-control is-valid" name="tglPemakaman"/>						   
						</div>
                    </div>
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Yang Melayani</label>
                        <div class="col-sm-10">
                            <input type="text" name="yangMelayani" class="form-control is-valid">
                        </div>
                    </div>
					<br>
                    <input type="submit" name="btnSaveKematian" class="btn btn-primary float-right" value="Simpan">
                </div>
            </div>
        </div>
        </form>
	</section>
	<hr>
	<div class="container-fluid">
		<br><h3>Data Kematian</h3><br>
			<table id="table_id" class="display" style="flex-shrink: 0; width:100%">
				<thead>
					<tr>
						<th>Nomor Jemaat</th>
						<th>Nama Jemaat</th>
						<th>Tanggal Meninggal</th>
						<th>Lokasi Pemakaman</th>
						<th>Tanggal Pemakaman</th>
						<th>Yang Melayani</th>
					</tr>
				</thead>
				<tbody>
				<?php
				/* @var $row Kematian */
					foreach($result as $row) {
						echo '<tr>';
						echo '<td>' . $row->getNoJemaat() . '</td>';
						echo '<td>' . $row->getNamaJemaat() . '</td>';
						echo '<td>' . date_format(date_create($row->getTglMeninggal()), 'd-M-Y') . '</td>';
						echo '<td>' . $row->getLokasiPemakaman() . '</td>';
						echo '<td>' . date_format(date_create($row->getTglPemakaman()), 'd-M-Y') . '</td>';
						echo '<td>' . $row->getYangMelayani() . '</td>';
						echo '</tr>';
					}
				?>
				</tbody>
			</table>
	</div>
</body>
<script>
$(document).ready( function () {
    $('#table_id').DataTable({"dom": '<f<t>>'});
} );
</script>
<?php include 'footer-2.php'; ?>