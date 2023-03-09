<?php 
include_once 'header-2.php';
?>
    <section class="statistics">
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col-lg-12">
                    <form method="POST" enctype="multipart/form-data">
                </div>
    </section>
    <ul class="breadcrumb">
        <li class="breadcrumb-item active"><a href="data_pribadi.php">Data Pribadi</a>
            <!--        <li class="breadcrumb-item active"><a href="#">Alamat</a>-->
            <!--        <li class="breadcrumb-item active"><a href="#">Kontak</a></li>-->
            <!--        </li> </li>-->
    </ul>
    <section class="statistics">
        <div class="container-fluid">
            <h3>DATA PRIBADI</h3>
            <div class="row d-flex">
                <div class="col-lg-12">


                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" name="txtNama" class="form-control is-valid"
                                   placeholder="Nama Lengkap Jemaat sesuai dengan KTP">
                        </div>
                    </div>

                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nama Panggilan</label>
                        <div class="col-sm-10">
                            <input type="text" name="txtNamaPanggil" class="form-control is-valid"
                                   placeholder="Nama Panggilan Jemaat">
                        </div>
                    </div>

                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nomor Anggota</label>
                        <div class="col-sm-10">
                            <input type="text" name="txtNoAnggota" class="form-control is-valid"
                                   placeholder="Nomor Anggota Gereja Jemaat">
                        </div>
                    </div>


                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Jenis Anggota</label>
                        <div class="col-sm-10">
                            <input type="radio" name="txtJnsAnggota" value="Pasif">&nbsp Pasif &nbsp
                            <input type="radio" name="txtJnsAnggota" value="Aktifis">&nbsp Aktifis &nbsp
                            <input type="radio" name="txtJnsAnggota" value="Dalam Pembinaan">&nbsp Dalam Pembinaan &nbsp
                            <input type="radio" name="txtJnsAnggota" value="Keluar">&nbsp Keluar &nbsp
                        </div>
                    </div>


                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Foto</label>
                        <div class="col-sm-10">
                            <input type="file" name="Foto" accept="image/png, image/jpeg"/>
                        </div>
                    </div>

                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Status Jemaat</label>
                        <div class="col-sm-10">
                            <input type="radio" name="txtStatus" value="Simpatisan">&nbsp Simpatisan &nbsp
                            <input type="radio" name="txtStatus" value="Calon">&nbsp Calon &nbsp
                            <input type="radio" name="txtStatus" value="SIDI">&nbsp SIDI &nbsp
                            <input type="radio" name="txtStatus" value="Baptis">&nbsp Baptis &nbsp
                            <input type="radio" name="txtStatus" value="Tidak Diketahui">&nbsp Tidak Diketahui &nbsp
                        </div>
                    </div>

                    <!--JENIS KELAMIN-->
                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input type="radio" name="gender" value="male">&nbsp Laki-laki &nbsp
                            <input type="radio" name="gender" value="female">&nbsp Perempuan &nbsp
                            <input type="radio" name="gender" value="other">&nbsp Tidak Diketahui &nbsp
                        </div>
                    </div>

                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">PEKERJAAN</label>
                        <div class="col-sm-10">
                            <select name="pekerjaan" class="form-control is-valid">
                                <option>Pengusaha</option>
                                <option>Dokter</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">PEKERJAAN</label>
 
                            <div class="col-sm-10">
                                <select name="pekerjaan" class="form-control is-valid">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <?php
                                    /* @var $row2 Pekerjaan */
                                    foreach($result as $row) {
                                        echo "<option value='".$row->getIdPekerjaan()."'>".$row->getNama()."</option>";
                                    }
                                    ?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                    </div>


                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">GEREJA</label>
                        <div class="col-sm-10">
                            <input type="text" name="txtGereja" class="form-control is-valid">
                        </div>
                    </div>
                    <input type="submit" name="btnsimpan" class="btn btn-primary" value="Simpan">
                </div>
            </div>
        </div>
        l</form>

    </section>

<?php 
include_once 'footer-2.php';
?>