<?php
class AktivitasController
{
    private $aktDaoImplement;
	private $uDaoImplement;
	
    function __construct()
    {
        $this->aktDaoImplement = new AktivitasDaoImpl();
		$this->uDaoImplement = new UserDaoImpl();
    }
    public function riwayat_kegiatan()
    {
        $btnSubmit = FILTER_INPUT(INPUT_POST, 'btnSubmit');
		$result2 = $this->uDaoImplement->getAllUser();
		$result = $this->aktDaoImplement->fetchAktivitas();
		require_once 'riwayat_kegiatan.php';
    }
	public function rekap_kegiatan()
	{
		$total = $this->aktDaoImplement->totalAktivitas();
		$totalA = $this->aktDaoImplement->totalAktivitasAcara();
		$totalO = $this->aktDaoImplement->totalAktivitasOrg();
		$result = $this->aktDaoImplement->fetchAktivitas();
		require_once 'rekapitulasi_kegiatan.php';
	}
	public function riwayat_aktivitas()
	{
		$result = $this->aktDaoImplement->fetchDataKepanitiaan($_SESSION['userid']);
		require_once 'riwayat_aktivitas.php';
	}
}