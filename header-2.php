 <!-- Bootstrap CSS-->
	<script language="JavaScript" type="text/javascript" src="./assets/js/jquery-3.2.1.min.js"></script>
    
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="assets/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"> -->
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="assets/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="assets/css/custom.css">
	
    <!-- Favicon-->
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
	    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header align-items-center justify-content-center">
		
          <!-- User Info-->
          <div class="sidenav-header-inner text-center">
            <p class="h5">Sistem Informasi Gereja</p>
          </div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="index.php"> <i class="fa fa-home"></i>HOME</a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-book"></i>Data Jemaat</a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="index.php?menu=data_pribadi">Data Pribadi</a></li>
              </ul>
            </li>
			 <li><a href="#exampledropdownDropdown1" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-book"></i>Atestasi</a>
              <ul id="exampledropdownDropdown1" class="collapse list-unstyled ">
                
                <li><a href="index.php?menu=pengajuan_AK">Pengajuan Atestasi Keluar</a></li>
			
                <li><a href="index.php?menu=persetujuan_atestasimasuk">Persetujuan Atestasi Masuk</a></li>
                <li><a href="persetujuan_AK.php">Persetujuan Atestasi Keluar</a></li>
				
				<li><a href="LaporanRekapitulasi.php">Laporan Rekapitulasi</a></li>
			
              </ul>
            </li>
			<li> <a href="index.php?menu=kelahiran"> <i class="fa fa-book"> </i>Data Kelahiran</a></li>
			<li> <a href="index.php?menu=kematian"> <i class="fa fa-book"> </i>Data Kematian</a></li>
			<li> <a href="baptis.php"> <i class="fa fa-book"> </i>Layanan Gereja</a></li>
			<li><a href="#exampledropdownDropdown2" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-book"></i>Data Aktivitas</a>
              <ul id="exampledropdownDropdown2" class="collapse list-unstyled ">
                <?php if (isset($_SESSION['role']) && $_SESSION['role']== "admin"){?>
                <li><a href="index.php?menu=riwayat_k">Kelola Kegiatan</a></li>
				<?php } else if (isset($_SESSION['role']) && $_SESSION['role'] != "admin"){?>
				<li><a href="index.php?menu=riwayat_a">Riwayat Aktivitas Anda</a></li>
				<?php } ?>
				<?php if (isset($_SESSION['role']) && $_SESSION['role']!= "jemaat"){?>
                <li><a href="index.php?menu=rekap_k">Laporan Rekapitulasi Kegiatan</a></li>
				<?php } ?>
              </ul>
            </li>
			</ul>
        </div>       
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header">
				<a id="toggle-btn" href="#" class="menu-btn"><i class="fa fa-bars"> </i></a>
				<a class="navbar-brand"><div class="brand-text d-none d-md-inline-block"></div></a>
			  </div>
				  
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Messages dropdown-->
                <li class="nav-item dropdown"><a rel="nofollow" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><i class="fa fa-user"></i></a>
                  <ul aria-labelledby="languages" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"><i class="fa fa-user"></i><span>Profil</span></a></li>
                    <li><a rel="nofollow" href="index.php?menu=logout" class="dropdown-item"><i class="fa fa-sign-out"></i><span>Keluar</span></a></li>
                  </ul>
                </li>
                <!-- Log out--></ul>
            </div>
          </div>
        </nav>
      </header>