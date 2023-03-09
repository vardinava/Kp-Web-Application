<?php 
include_once 'header-2.php';
?>
<head>
<link rel="stylesheet" type="text/css" href="./assets/vendor/datatables/css/jquery.dataTables.css"/><link rel="stylesheet" type="text/css" href="./assets/vendor/datatables/css/dataTables.semanticui.css"/>
</head>
<body>  
	<div class="container-fluid">
		<br><h3>Kelola Kegiatan</h3><br>
			<button type="button" name="addData" id="addData" data-toggle="modal" data-target="#myModalIn" class="btn btn-primary">Tambah Kegiatan</button>
			<br><br>
			<table id="table_id" class="display">
				<thead>
					<tr>
						<th>Nama Kegiatan</th>
						<th>Jenis Kegiatan</th>
						<th>Tanggal mulai</th>
						<th>Tanggal berakhir</th>
						<th style="text-align:center">Detail</th>
						<th style="text-align:center">Kelola Panitia</th>
						<th style="text-align:center">Update / Delete</th>
					</tr>
				</thead>
				<tbody>
				<?php
				/* @var $row Aktivitas */
					foreach($result as $row) {
						echo '<tr>';
						echo '<td>' . $row->getNama_kegiatan() . '</td>';
						echo '<td>' . $row->getJenis() . '</td>';
						echo '<td>' . date_format(date_create($row->getTanggalMulai()), 'd M Y') . '</td>';
						echo '<td>' . date_format(date_create($row->getTanggalSelesai()), 'd M Y') . '</td>';
						echo '<td style="text-align:center"><button name="info" class="actinfo btn btn-info" data-id="'. $id = $row->getId_kegiatan() .'">Detail</button></td>';
						echo '<td style="text-align:center"><button type="button" id="btnpanitia" name="btnpanitia" class="actpanitia btn btn-primary" data-date="'. $date = $row->getTanggalSelesai() .'" data-name="'. $name = $row->getNama_kegiatan() .'" data-id="'. $id = $row->getId_kegiatan() .'">Edit</button></td>';
						echo '<td style="text-align:center"><button name="edit" class="actup btn btn-success" data-id="'. $id = $row->getId_kegiatan() .'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
						<button name="delete" class="actdel btn btn-danger" data-name="'. $name = $row->getNama_kegiatan() .'" data-id="'. $id = $row->getId_kegiatan() .'"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>';
						echo '</tr>';
					}
				?>
				</tbody>
			</table>
	</div>
</body>

  <!-- Modal Info -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
			
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- Modal Panitia -->
  <div class="modal fade" id="myModalPanitia" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Daftar Panitia</h4>
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body3" style="padding: 10px;">
			Atur daftar panitia untuk kegiatan : <a id="namak"></a></br>
		<form method="POST" enctype="multipart/form-data" name="add_panitia" id="add_panitia">
		   <table class="table"> 	
				<tr>
					<td>
						<select id="txtuser" name="txtuser" class="form-control is-valid">
							<option selected="selected">Nama Anggota</option>
							<?php
							/* @var $row User*/
							foreach($result2 as $row) {
									if($row->getId_role()!="ad"){
										echo "<option value='".$row->getIdUser()."'>".$row->getNama()."</option>";
									}
								}
							?>
						</select>
						<div class="select-dropdown"></div>
					</td>
					<td><input type="text" id="jabatan" name="jabatan" placeholder="Jabatan" class="form-control name_list" /></td>
					<td style="vertical-align:middle;">
					<input type="checkbox" id="tipe" name="tipe" style="vertical-align: middle;">
					<label for="tipe"> Jabatan Tetap</label>
					</td>
					<td><button type="button" name="add" id="add" class="btn btn-success">Tambah</button></td>
				</tr>
				<tr>
					<table class="table" id="dynamic_field"> 	
					</table>
				</tr>
				
				<tr><td>
					<input type="hidden" name="thisId" id="thisId" />  
					<input type="hidden" name="thisTgl" id="thisTgl" />  
					<input type="hidden" name="tempDel[]" id="tempDel[]" />  
					<input type="submit" id="aturDaftar" name="aturDaftar" class="btn btn-primary float-right" value="Atur Daftar" />
				</td><tr>
			</table>
		</form>
        </div>
		
      </div>
      
    </div>
  </div>
 
  <!-- Modal Insert  -->
  <div class="modal fade" id="myModalIn" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><p id="title">Tambah Data Kegiatan</p></h4>
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body2" style="padding: 10px;">
			<form method="POST" enctype="multipart/form-data" action="" name="form_insert" id="form_insert">
                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nama Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" id="txtNama" name="txtNama" class="form-control is-valid" placeholder="Masukkan Nama Kegiatan" required />
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Jenis Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="radio" name="rdjenis" value="Acara" checked>&nbsp Acara &nbsp
                            <input type="radio" name="rdjenis" value="Organisasi">&nbsp Organisasi &nbsp
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Tanggal Mulai</label>
						<div class="col-sm-10">
						   <input type='date' class="form-control is-valid" name="tglM" id="tglM" required />
						</div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Tanggal Selesai</label>
						<div class="col-sm-10">
						   <input type='date' class="form-control is-valid" name="tglS" id="tglS" required />
						</div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Deskripsi</label>
                        <div class="col-sm-10">
                         <textarea class="form-control is-valid" id="txtDeskripsi" name="txtDeskripsi" placeholder="Masukkan Deskripsi (Max 250 kata, tidak wajib)"></textarea>
                      </div>
                    </div>

                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Bukti SK <br><small>(jpg/png/pdf, max 5mb)</small></label>
                        <div class="col-sm-10">
                            <input type="file" name="file" id="file" accept="image/png, image/jpeg, application/pdf"/>
                        </div>
                    </div>
					<br>
					<input type="hidden" name="updating" id="updating" />  
					<input type="hidden" name="sket" id="sket" />  
                    <input type="submit" name="insert" id="insert" class="btn btn-primary float-right" value="Kirim" />
			</form>
        </div>
      </div>
      
    </div>
  </div>
 <script>
$(document).ready( function () {
    var table = $('#table_id').DataTable({"autoWidth":false,"dom": '<lf<t>p>',
	"columns": [
        { "width": "14%" },
        { "width": "14%" },
        { "width": "14%" },
        { "width": "14%" },
        { "width": "14%" },
        { "width": "14%" },
        { "width": "200px" }
	]});
	var i=0;  
	$('#add').click(function(e){
		e.preventDefault();
		var jab = document.getElementById('jabatan').value;
		var cmb = document.getElementById('txtuser');
		var user = cmb.options[cmb.selectedIndex].text;
		var iduser = cmb.options[cmb.selectedIndex].value;
		var status = 0;
		var ket = 'jabatan sementara';
		if (document.getElementById('tipe').checked) {
			status = 1;
			ket = 'jabatan permanen';
		}
		if(user == 'Nama Anggota') {
			alert('Mohon pilih nama anggota');
		} else if (jab == ''){
			alert('Mohon masukkan nama jabatan');
		}
		else { 
			$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="hidden" name="user[]" value="'+iduser+'"><input type="text" value="'+user+'" class="form-control name_list" readonly /></td><td><input type="text" name="name[]" value="'+jab+'" class="form-control name_list" /></td><td><input type="hidden" name="status[]" value="'+status+'" /><input type="text" value="'+ket+'" class="form-control name_list" readonly /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
			document.getElementById('jabatan').value='';
			$('#tipe').removeAttr('checked');
			i++;
		}
	});  
	
	$(document).on('click', '.btn_remove', function(e){ 
		e.preventDefault();
		var button_id = $(this).attr("id");   
		$('#row'+button_id+'').remove();
	});
	var tempDelete = [];
	$(document).on('click', '.btn_remover', function(e){ 
		e.preventDefault();
		var idpanitia = $(this).attr("idpanitia");
		tempDelete.push(idpanitia);
		document.getElementById('tempDel[]').value = tempDelete;
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
	  
	/** CRUD Data Aktivitas **/
	$('#addData').click(function(){  
	   $('#insert').val("Kirim");
	   $('#title').text("Tambah Data Kegiatan");
	   $('#form_insert')[0].reset();
	   $('#updating').val('');  
    });
	
	$('#form_insert').on("submit", function(event){  
	    event.preventDefault(); 
		var form = $("#form_insert")[0];
		var data = new FormData(form);
	    if($('#txtNama').val()==''){  
			alert("Mohon masukkan nama kegiatan");  
	    }  
	    else if($('#tglM').val() == ''){  
			alert("Mohon isi tanggal mulai kegiatan");  
	    }  
	    else if($('#tglS').val() == '') {  
			alert("Mohon isi tanggal selesai kegiatan");  
	    }
	    else {
			$.ajax({  
				 url:"./util/ajax_CRUD.php",  
				 method:"POST",  
				 data:data,  
				 contentType: false,
				 processData: false,
				 beforeSend:function(){
					  $('#insert').val("Mengirim..");  
				 }, 
				 success:function(data){  
					  alert(data);
				 },
				 complete:function(data){  
					  $('#form_insert')[0].reset();  
					  $('#myModalIn').modal('hide');
				 }  
			});  
	   }  
      });    
	  
	$(document).on('click', '.actinfo', function(){  
       var actid = $(this).attr("data-id");   
       $.ajax({
            url: "./util/ajax_CRUD.php",
            type: "POST",
            data: {actid: actid},
            success: function(response) {
               $('.modal-body').html(response);
			   $('#myModal').modal('show'); 
           }
         }); 

     });
	 
	 $(document).on('click', '.actup', function(){  
           var updating = $(this).attr("data-id");  
           $.ajax({  
                url:"./util/ajax_CRUD.php",  
                method:"POST",  
                data:{updating:updating},  
                dataType:"json",  
                success:function(data){  
                     $('#txtNama').val(data.nama_kegiatan);  
                     $('#tglM').val(data.tanggal_mulai);  
                     $('#tglS').val(data.tanggal_selesai);  
                     $('#txtDeskripsi').val(data.deskripsi);
                     $('#sket').val(data.sk);
					 $('#updating').val(data.id_kegiatan);  
                     $('#insert').val("Update");
					 $('#title').text("Update Data Kegiatan");
                     $('#myModalIn').modal('show');  
                }  
           });  
      });
	  
	  //panitia
	  $(document).on('click', '.actpanitia', function(){  
           var panid = $(this).attr("data-id");
		   var namathis = $(this).attr("data-name");
		   var tglthis = $(this).attr("data-date");
		   $('#add_panitia')[0].reset();
           $.ajax({  
                url:"./util/ajax_panitia.php",  
                method:"POST",  
                data:{panid:panid},
                success:function(response){
					$('#namak').text(namathis);
					$('#dynamic_field').empty();
					$('#thisId').val(panid);  
					$('#thisTgl').val(tglthis);  
					$('#dynamic_field').html(response);
					tempDelete.length = 0;
                    $('#myModalPanitia').modal('show');					
                }  
           });  
      });
	  
	  $('#add_panitia').on("submit", function(event){  
           event.preventDefault();
			$.ajax({  
				 url:"./util/ajax_panitia.php",  
				 method:"POST",  
				 data:$('#add_panitia').serialize(),  
				 beforeSend:function(){
					  $('#aturDaftar').val("Mengatur..");  
				 },  
				 success:function(data){  
					  $('#add_panitia')[0].reset(); 
					  alert(data);
					  $('#myModalPanitia').modal('hide');
					  $('#aturDaftar').val("Atur Panitia");  
				 }  
			});  
      });    
	  
	$(document).on('click', '.actdel', function(){  
		
       var del = $(this).attr("data-id");   
	   var namathis = $(this).attr("data-name");
	   var pilih = confirm("Lanjutkan menghapus data kegiatan "+namathis+" ?");
	   if (pilih) {
		   $.ajax({
				url: "./util/ajax_CRUD.php",
				type: "POST",
				data: {del: del},
				success: function(response) {
					alert(response);
			   }
			 }); 
	   }
     });
} );</script>
<?php include 'footer-2.php'; ?>