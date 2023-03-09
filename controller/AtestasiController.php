<?php
class AtestasiController
{
    private $atestasiDaoImplement;
    function __construct()
    {
        $this->atestasiDaoImplement = new AtestasiDaoImpl();
    }
    public function atestasiMasukPage()
    {
        $btnSaveAtestasi = FILTER_INPUT(INPUT_POST, 'btnSaveAtestasi');
        if ($btnSaveAtestasi) {
            $msg = 'gagal';
            $tglPengajuan = date("Y-m-d H:i:s");
            $txtnama = FILTER_INPUT(INPUT_POST, 'namaLengkap');
            $txtalamat = FILTER_INPUT(INPUT_POST, 'alamat');
            $txtemail = FILTER_INPUT(INPUT_POST, 'email');
            $txtnoTelp = FILTER_INPUT(INPUT_POST, 'noTelp');
            $txtnoWA = FILTER_INPUT(INPUT_POST, 'noWA');
            $txtagama = FILTER_INPUT(INPUT_POST, 'agama');
            $txtgerejaAsal = FILTER_INPUT(INPUT_POST, 'gerejaAsal');
            $noAtestasi = date("y") . date("m") . date('d');

            $addAtestasiMasuk = new AtestasiMasuk();
            $addAtestasiMasuk->setNoAtestasi($noAtestasi);
            $addAtestasiMasuk->setTglPengajuan($tglPengajuan);
            $addAtestasiMasuk->setNamaLengkap($txtnama);
            $addAtestasiMasuk->setAlamat($txtalamat);
            $addAtestasiMasuk->setEmail($txtemail);
            $addAtestasiMasuk->setNoTelepon($txtnoTelp);
            $addAtestasiMasuk->setNoWA($txtnoWA);
            $addAtestasiMasuk->setAgama($txtagama);
            $addAtestasiMasuk->setGerejaAsal($txtgerejaAsal);
            $addAtestasiMasuk->setStatus("Belum Disetujui");

            $namafileFoto = $_FILES['pasFoto']['name'];
            $lokasiFoto = $_FILES['pasFoto']['tmp_name'];
            $ukuranFoto = $_FILES['pasFoto']['size'];
            $tipeFoto = pathinfo($namafileFoto, PATHINFO_EXTENSION);
            if ($namafileFoto != NULL) {
                if ($tipeFoto == 'png' || $tipeFoto == 'PNG' || $tipeFoto == 'jpg' || $tipeFoto == 'gif' || $tipeFoto == 'jpeg') {
                    $alamatFoto = 'picture/' . $namafileFoto;
                    move_uploaded_file($lokasiFoto, $alamatFoto);
                    $addAtestasiMasuk->setPasFoto($alamatFoto);
                }
            }

            $namafileScanAkte = $_FILES['scanAkteBaptisSidi']['name'];
            $lokasiScanAkte = $_FILES['scanAkteBaptisSidi']['tmp_name'];
            $ukuranScanAkte = $_FILES['scanAkteBaptisSidi']['size'];
            $tipeScanAkte = pathinfo($namafileScanAkte, PATHINFO_EXTENSION);
            if ($namafileScanAkte != NULL) {
                if ($tipeScanAkte == 'png' || $tipeScanAkte == 'PNG' || $tipeScanAkte == 'jpg' || $tipeScanAkte == 'gif' || $tipeScanAkte == 'jpeg') {
                    $alamatScanAkte = 'picture/' . $namafileScanAkte;
                    move_uploaded_file($lokasiScanAkte, $alamatScanAkte);
                    $addAtestasiMasuk->setScanAkteBaptisSidi($alamatScanAkte);
                }
            }

            $namafileSuratKeterangan = $_FILES['suratKeterangan']['name'];
            $lokasiSuratKeterangan = $_FILES['suratKeterangan']['tmp_name'];
            $ukuranSuratKeterangan = $_FILES['suratKeterangan']['size'];
            $tipeSuratKeterangan = pathinfo($namafileSuratKeterangan, PATHINFO_EXTENSION);
            if ($namafileSuratKeterangan != NULL) {
                if ($tipeSuratKeterangan == 'png' || $tipeSuratKeterangan == 'PNG' || $tipeSuratKeterangan == 'jpg' || $tipeSuratKeterangan == 'gif' || $tipeSuratKeterangan == 'jpeg') {
                    $alamatSuratKeterangan = 'picture/' . $namafileSuratKeterangan;
                    move_uploaded_file($lokasiSuratKeterangan, $alamatSuratKeterangan);
                    $addAtestasiMasuk->setSuratKeterangan($alamatSuratKeterangan);
                }
            }

            $msg = $this->atestasiDaoImplement->insertAtestasi($addAtestasiMasuk);
        }
        require_once 'atestasiMasuk.php';
    }
	public function persetujuanMasukPage()
	{
		$result = $this->atestasiDaoImplement->fetchAtestasi();
		require_once 'persetujuan_AM.php';
	}
}