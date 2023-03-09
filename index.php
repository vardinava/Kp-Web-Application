<?php
define ('SITE_ROOT', realpath(dirname(__FILE__)));
session_start();
include_once 'util/PDOUtil.php';
include_once 'dao/UserDaoImpl.php';
include_once 'dao/PekerjaanDaoImpl.php';
include_once 'dao/AtestasiDaoImpl.php';
include_once 'dao/AktivitasDaoImpl.php';
include_once 'dao/GerejaDaoImpl.php';
include_once 'dao/KelahiranDaoImpl.php';
include_once 'dao/KematianDaoImpl.php';
include_once 'entity/User.php';
include_once 'entity/Pekerjaan.php';
include_once 'entity/AtestasiMasuk.php';
include_once 'entity/Gereja.php';
include_once 'entity/Aktivitas.php';
include_once 'entity/Panitia.php';
include_once 'entity/Kelahiran.php';
include_once 'entity/Kematian.php';
include_once 'controller/UserController.php';
include_once 'controller/AtestasiController.php';
include_once 'controller/PekerjaanController.php';
include_once 'controller/GerejaController.php';
include_once 'controller/AktivitasController.php';
include_once 'controller/KelahiranController.php';
include_once 'controller/KematianController.php';
if(!isset($_SESSION['my_session'])){
    $_SESSION['my_session']=false;
}
?>
<html>
	<head>
		<title>Sistem Informasi Gereja</title>	
	</head>
	<body>
	<?php
        $menu = FILTER_INPUT(INPUT_GET, 'menu');
        switch ($menu) {
            case 'atestasi_masuk' : {
                    $atestasiControl = new AtestasiController ();
                    $atestasiControl->atestasiMasukPage();
                }
                break;
			case 'persetujuan_atestasimasuk' : {
                    $atestasiControl = new AtestasiController ();
                    $atestasiControl->persetujuanMasukPage();
                }
                break;
			case 'login' :{
				$userControl = new UserController();
				$userControl->userLogin();
				}
				break;
			case 'logout' :{
				$userControl = new UserController();
				$userControl->userLogout();
				}
				break;
			case 'data_pribadi' :{
				$pekerjaanControl = new PekerjaanController();
				$pekerjaanControl->dataPribadiPage();
				}
				break;
			case 'pengajuan_AK' :{
				$gerejaControl = new GerejaController();
				$gerejaControl->optionGereja();
				}
				break;
			case 'riwayat_k' :{
				if ($_SESSION['role']== "admin"){
				$aktivitasControl = new AktivitasController ();
                $aktivitasControl->riwayat_kegiatan();
				}
				break;
			}
			case 'rekap_k' :{
				if ($_SESSION['role']!= "jemaat"){
				$aktivitasControl = new AktivitasController ();
                $aktivitasControl->rekap_kegiatan();
				}
				break;
			}
			case 'riwayat_a' :{
			if ($_SESSION['role']!= "admin"){
				$aktivitasControl = new AktivitasController ();
                $aktivitasControl->riwayat_aktivitas();
				}
				break;
			}
			case 'kelahiran' : {
                    $kelahiranControl = new KelahiranController ();
                    $kelahiranControl->kelahiranMasukPage();
                }
                break;
			case 'kematian' : {
                    $kematianControl = new KematianController ();
                    $kematianControl->kematianMasukPage();
                }
                break;
            default:
                {
					if($_SESSION['my_session']){
						include'home-2.php';
					}else{
						include'beranda.php';
					}
                }
        }
        ?>
	</body>
</html>