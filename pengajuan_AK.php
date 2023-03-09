<?php 
include'header-2.php'; ?>
      <section class="statistics">
        <div class="container-fluid">
          <div class="row d-flex">
            <div class="col-lg-12">
              <form method="POST" enctype="multipart/form-data">
        </div>
      </section>

       <section class="statistics">
        <div class="container-fluid">
		  <h3>PENGAJUAN ATESTASI KELUAR</h3>
          <div class="row d-flex">
            <div class="col-lg-12">
              
                <div class="form-group row has-success">
                      <label class="col-sm-2 form-control-label">Nomor Jemaat</label>
                      <div class="col-sm-10">
                        <input type="text" name="txtNoJemaat" class="form-control is-valid" placeholder="Masukkan Nomor Jemaat Anda">
                      </div>
                </div>
                  <div class="form-group row has-success">
                      <label class="col-sm-2 form-control-label">Nama Lengkap</label>
                      <div class="col-sm-10">
                        <input type="text" name="txtNama" class="form-control is-valid" placeholder="Masukkan Nama Lengkap Anda">
                      </div>
                </div>
                  <div class="form-group row has-success">
                      <label class="col-sm-2 form-control-label">Alamat Lama</label>
                      <div class="col-sm-10">
                         <textarea class="form-control is-valid" id="alamatLama" rows="3" placeholder="Masukkan Alamat Lama"></textarea>
                      </div>
                  </div>
				  <div class="form-group row has-success">
                      <label class="col-sm-2 form-control-label">Alamat Baru</label>
                      <div class="col-sm-10">
                        <textarea class="form-control is-valid" id="alamatBaru" rows="3" placeholder="Masukkan Alamat Baru"></textarea>
                      </div>
                  </div>
                  
                  <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Gereja</label>
 
                            <div class="col-sm-10">
                                <select name="pekerjaan" class="form-control is-valid">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <?php
                                    /* @var $row Gereja */
                                    foreach($result as $row) {
                                        echo "<option value='".$row->getIdGereja()."'>".$row->getNama()."</option>";
                                    }
                                    ?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                    </div>
                  <div class="form-group row has-success">
                      <label class="col-sm-2 form-control-label">Alamat Gereja</label>
                      <div class="col-sm-10">
                        <input type="text" name="txtAlamatGereja" class="form-control is-valid" placeholder="Masukkan Alamat Gereja">
                      </div>
                  </div>
				   <div class="form-group row has-success">
                      <label class="col-sm-2 form-control-label">Dengan Alasan</label>
                      <div class="col-sm-10">
                         <textarea class="form-control is-valid" id="alasan" rows="3" placeholder="Masukkan Alasan"></textarea>
                      </div>
                  </div>
				   <div class="form-group row has-success">
                      <label class="col-sm-2 form-control-label">Anggota Keluarga yang Turut Pindah</label>
                      <div class="col-sm-10">
                       <div class="form-group">
                          <div class="input-group">
                            <form name="add_name" id="add_name"> 
								<table class="table" id="dynamic_field">  
									<tr>
										<input type="text" name="name[]" placeholder="Masukkan Nama" class="form-control is-valid">
										<button type="button" name="add" id="add" class="btn btn-success">+</button>
									</tr>
								</table>
							</form>
                          </div>
                        </div>
					</div>
                  </div>
                <input type="submit" name="btnsimpan" class="btn btn-primary" style="float: right;" value="Ajukan Atestasi">
                </div>
              </div>
          </div>
      </section> 
      </form>
<script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Masukkan Nama" class="form-control " /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"#",  
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
<?php include'footer-2.php'; ?>