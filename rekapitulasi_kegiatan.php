<?php 
include_once 'header-2.php';
?>
<head>
<link rel="stylesheet" type="text/css" href="./assets/vendor/datatables/css/jquery.dataTables.css"/><link rel="stylesheet" type="text/css" href="./assets/vendor/datatables/css/dataTables.semanticui.css"/>
</head>
<body>
	<div class="container-fluid">
		<br><h3>Rekapitulasi Kegiatan</h3><br>
			<h5>Jumlah Kegiatan</h5>
			<div class="form-group row has-success">
				<label class="col-sm-1 form-control-label">Semua</label>
				<label class="col-sm-1 form-control-label"> : </label>
				<label class="col-sm-1 form-control-label" id="jumlah"><?php echo $total; ?></label>
            </div>
			<div class="form-group row has-success">
				<label class="col-sm-1 form-control-label">Acara</label>
				<label class="col-sm-1 form-control-label"> : </label>
				<label class="col-sm-1 form-control-label" id="jumlah"><?php echo $totalA; ?></label>
            </div>
			<div class="form-group row has-success">
				<label class="col-sm-1 form-control-label">Organisasi</label>
				<label class="col-sm-1 form-control-label"> : </label>
				<label class="col-sm-1 form-control-label" id="jumlah"><?php echo $totalO; ?></label>
            </div><br><hr>
			
			
			<div class="form-group row has-success">
				<label class="col-sm-2 form-control-label">Tampilkan Kegiatan :</label>
				<div class="col-sm-4">
					<select id="txtjenis" name="txtjenis" class="form-control is-valid">
						<option value="" selected="selected">Semua</option>
						<option value="Acara">Acara</option>
						<option value="Organisasi">Organisasi</option>
					</select>
					<input type="hidden" name="tampilan" id="tampilan" />
				</div>
			</div>
			<br>
			<table id="table_id" class="display">
				<thead>
					<tr>
						<th>Nama Kegiatan</th>
						<th>Tanggal mulai</th>
						<th>Tanggal berakhir</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
	</div>
</body>

 <script>
$(document).ready( function () {
    $('#table_id').DataTable({"dom": '<lf<t>p>',
	"columns": [
        { "width": "33%" },
        { "width": "33%" },
        { "width": "800px" }
	]});
	
	isi_tabel();
 
	function isi_tabel(query='')
	{
		$.ajax({
			url:"./util/tabel_rekapitulasi.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				$('tbody').html(data);
			}
		})
	}

	$('#txtjenis').change(function(){
		$('#tampilan').val($('#txtjenis').val());
		var query = $('#tampilan').val();
		isi_tabel(query);
	});
} );</script>
<?php include 'footer-2.php'; ?>