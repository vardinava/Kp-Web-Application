<?php 
include_once 'header-2.php';
?>
<head>
<link rel="stylesheet" type="text/css" href="./assets/vendor/datatables/css/jquery.dataTables.css"/><link rel="stylesheet" type="text/css" href="./assets/vendor/datatables/css/dataTables.bootstrap.css"/>
</head>
<body>
<section class="statistics">
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col-lg-12">
                    <form method="POST" enctype="multipart/form-data">
                </div>
    </section>
    <ul class="breadcrumb">
        <li class="breadcrumb-item active"><a href="#">Pendaftaran Kegiatan</a>
    </ul>
	<!--dimasukkin ke modal nnti-->
    <section class="statistics">
        <div class="container-fluid">
            <h3>Form Aktivitas</h3><br>
            <div class="row d-flex">
                <div class="col-lg-12">
                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nama Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" name="txtNama" class="form-control is-valid">
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Tanggal Mulai</label>
						<div class="col-sm-10">
                        <div class='input-group date' id='datetimepicker1'>
						   <input type='text' class="form-control" name="txtTanggalM"/>
						   <span class="input-group-addon">
						   <span class="glyphicon glyphicon-calendar"></span>
						   </span>
						</div>
						</div>
						<script type="text/javascript">
							 $(function () {
								 $('#datetimepicker1').datepicker();
							 });
						 </script>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Tanggal Selesai</label>
						<div class="col-sm-10">
                        <div class='input-group date' id='datetimepicker2'>
						   <input type='text' class="form-control" name="txtTanggalS"/>
						   <span class="input-group-addon">
						   <span class="glyphicon glyphicon-calendar"></span>
						   </span>
						</div>
						</div>
						<script type="text/javascript">
							 $(function () {
								 $('#datetimepicker2').datepicker();
							 });
						 </script>
                    </div>
				

                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Bukti SK</label>
                        <div class="col-sm-10">
                            <input type="file" name="buktiSK" accept="image/png, image/jpeg, file/pdf"/>
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Deskripsi Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="textbox" name="txtDeskripsi" class="form-control is-valid" placeholder="Maksimal 250 karakter (tidak wajib)">
                        </div>
                    </div>

                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Daftar Panitia</label>
 
                            <div class="col-sm-4">
                                <select name="txtuser" class="form-control is-valid">
                                    <option disabled="disabled" selected="selected">Nama anggota</option>
                                    <?php
                                    /* @var $row User */
                                    foreach($result2 as $row) {
                                        echo "<option value='".$row->getIdUser()."'>".$row->getNama()."</option>";
                                    }
                                    ?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
							
							<div class="col-sm-4">
                            <input type="textbox" name="txtNewJabatan" class="form-control is-valid" placeholder="Nama Jabatan">
							</div>
							
							<div class="col-sm-2">
                            <input type="submit" name="btnAdd" class="btn btn-primary" value="Tambah">
							</div>
                    </div>
					<br>
                    <input type="submit" name="btnSubmit" class="btn btn-primary float-right" value="Kirim">
                </div>
            </div>
        </div>
        </form>
	</section>
<hr>
	<div class="container-fluid">
		<br><h3>Riwayat Kegiatan</h3><br>
			<div class="form-group row has-success">
				<label class="col-sm-2 form-control-label">Rentang Waktu : </label>
				<div class="col-sm-4">
					<select name="pekerjaan" class="form-control is-valid">
						<option>1 pekan terakhir</option>
						<option>1 bulan terakhir</option>
						<option>3 bulan terakhir</option>
						<option>Semua</option>
					</select>
				</div>
			</div>
			<table id="table_id" class="display" style="flex-shrink: 0; width:100%">
				<thead>
					<tr>
						<th>Nama Kegiatan</th>
						<th>Tanggal mulai</th>
						<th>Tanggal berakhir</th>
						<th>Panitia</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
				<?php
				/* @var $row Aktivitas */
					foreach($result as $row) {
						echo '<tr>';
						echo '<td>' . $row->getNama_kegiatan() . '</td>';
						echo '<td>' . date_format(date_create($row->getTanggalMulai()), 'd M Y') . '</td>';
						echo '<td>' . date_format(date_create($row->getTanggalSelesai()), 'd M Y') . '</td>';
						echo '<td><button class="actinfo" data-id="'. $id = $row->getId_kegiatan() .'">Detail</button></td>';
						echo '<td><button class="btn btn--radius-2 btn--blue" onclick="">Update</button>
						<button class="btn btn--radius-2 btn--blue" onclick="">Delete</button></td>';
						echo '</tr>';
					}
				?>
				</tbody>
			</table>
	</div>
</body>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <!--<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>-->
        <div class="modal-body">
		
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 <script>
$(document).ready( function () {
    $('#table_id').DataTable({"dom": '<f<t>>'});
	$(".actinfo").click(function(){
		
       var actid = $(this).attr("data-id");   
	   
       $.ajax({
            url: "./util/ajax.php",
            type: "POST",
            data: {actid: actid},
            success: function(response) {
				//menambah response dalam modal
               $('.modal-body').html(response);
			   $('#myModal').modal('show'); 
           }
         }); 

     });
} );</script>
<?php include 'footer-2.php'; ?>