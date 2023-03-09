<?php include'header.php'; ?>
<head>
<link rel="stylesheet" type="text/css" href="assets/styles/atestasi.css">
<script src="assets/js/main.js"></script>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="./assets/js/atestasi.js"></script>
<title>Atestasi Masuk</title>
</head>
	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="img/atestasi.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title"><span>ATESTASI</span>MASUK</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  <section id="contact" class="wow fadeInUp">
	<div class="contact">
		<div class="container">
      	 <div class="section-header mb-3">
            <h3>FORM PENGAJUAN ATESTASI MASUK</h3>
	        </div>
       <form action="" method="POST" enctype='multipart/form-data'>
        <label>Nama Lengkap</label>
        <input type="text" name="namaLengkap" placeholder="" class="form-control" required oninvalid="this.setCustomValidity('Nama Tidak Boleh Kosong')" oninput="setCustomValidity('')"> </input>
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" rows="2" data-rule="required" data-msg="Pesan Tidak Boleh Kosong"></textarea>	
		<label>Email </label>
        <input type="email" class="form-control" name="email" id="email"> </input>
		<label>No Telp</label>
        <input type="text" name="noTelp" class="form-control"> </input>
        <label>No Whatsapp</label>
        <input type="text" name="noWA" class="form-control"> </input>
		<label><font color="#696969">Agama</font></label>
        <fieldset class="form-control">
			<div class="form-check">
			  <label class="form-check-label">
				<input type="radio" class="form-check-input" value="Kristen" name="agama" checked><font color="#696969">Kristen</font>
			  </label>
			</div>
			<div class="form-check">
			<label class="form-check-label">
				 <input type="radio" class="form-check-input" value="NonKristen" name="agama"><font color="#696969">Non Kristen</font>
			  </label>
			</div>
		</fieldset>
        <label>Pas Foto</label>
        <input type="file" name="pasFoto" class="form-control"> </input>
		<label>Scan Akte Baptis/Sidi</label>
        <input type="file" name="scanAkteBaptisSidi" class="form-control"> </input>
		<label>Gereja Asal</label>
        <input type="text" name="gerejaAsal" class="form-control"> </input>
		<label>Surat Keterangan/Atestasi Keluar dari Gereja Asal</label>
        <input type="file" name="suratKeterangan" class="form-control"> </input>	
		<label>Anggota Keluarga yang turut pindah (jika ada, masukkan nama, pas foto, dan scanAkte)</label>
		<form name="add_name" id="add_name"> 
			<table class="table" id="dynamic_field">  
			<tr class="form-group">
			<td>
				<input type="text" class="form-control" name="turutPindah[]" placeholder="Masukkan Nama">
			</td>
			<td>
				<input type="file" class="form-control" name="pasFoto[]">
			</td>
			<td>
				<input type="file" class="form-control" name="scanAkte[]">
			</td>
			<td>
				<button type="button" name="add" id="add" class="btn btn-success">+</button>
			</td>
			</tr>
			</table>
		</form>
		<div class="modal-footer">
			<input type="submit" name="btnSaveAtestasi" class="btn btn-primary" value="Ajukan Atestasi">
      </div>
	</form>
</div>
</div>
</section>
 <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="turutPindah[]" placeholder="Masukkan Nama" class="form-control " /></td><td><input type="file" name="pasFoto[]" placeholder="Masukkan Nama" class="form-control " /></td><td><input type="file" name="scanAkte[]" placeholder="Masukkan Nama" class="form-control " /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#btnSaveAtestasi').click(function(){            
           $.ajax({  
                url:"atestasi_masuk",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
 });  
 </script>
 <?php include'footer.php'; ?>