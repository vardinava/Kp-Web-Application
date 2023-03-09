<?php
class KelahiranController
{
    private $kelahiranDaoImplement;
    function __construct()
    {
        $this->kelahiranDaoImplement = new KelahiranDaoImpl();
    }
    public function kelahiranMasukPage()
    {
        $btnSaveKelahiran = FILTER_INPUT(INPUT_POST, 'btnSaveKelahiran');
        if ($btnSaveKelahiran) {
            $msg = 'gagal';
            $txtnoAkte = FILTER_INPUT(INPUT_POST, 'noAkte');
            $txtnamaAyah = FILTER_INPUT(INPUT_POST, 'namaAyah');
            $txtnamaIbu = FILTER_INPUT(INPUT_POST, 'namaIbu');
            $txtnamaAnak = FILTER_INPUT(INPUT_POST, 'namaAnak');
            $txtJK = FILTER_INPUT(INPUT_POST, 'jk');
            $txttglLahir = FILTER_INPUT(INPUT_POST, 'tglLahir');
			$tglLahir = new DateTime($txttglLahir);
            $txtgoldar = FILTER_INPUT(INPUT_POST, 'goldar');
            $txtnamaPelapor = FILTER_INPUT(INPUT_POST, 'namaPelapor');
            $txttglPelapor = FILTER_INPUT(INPUT_POST, 'tglPelapor');
			$tglPelapor = new DateTime($txtPelapor);

            $addKelahiran = new Kelahiran();
            $addKelahiran->setNoAkte($txtnoAkte);
            $addKelahiran->setNamaAyah($txtnamaAyah);
            $addKelahiran->setNamaIbu($txtnamaIbu);
            $addKelahiran->setNamaAnak($txtnamaAnak);
            $addKelahiran->setJK($txtJK);
            $addKelahiran->setTglLahir($txttglLahir);
            $addKelahiran->setGoldar($txtgoldar);
            $addKelahiran->setNamaPelapor($txtnamaPelapor);
            $addKelahiran->setTglPelapor($txttglPelapor);

            $msg = $this->kelahiranDaoImplement->insertKelahiran($addKelahiran);
        }
		$result = $this->kelahiranDaoImplement->fetchKelahiran();
        require_once 'kelahiran.php';
    }
}