<?php
class KematianController
{
    private $kematianDaoImplement;
    function __construct()
    {
        $this->kematianDaoImplement = new KematianDaoImpl();
    }
    public function kematianMasukPage()
    {
        $btnSaveKematian = FILTER_INPUT(INPUT_POST, 'btnSaveKematian');
        if ($btnSaveKematian) {
            $msg = 'gagal';
            $txtnoJemaat = FILTER_INPUT(INPUT_POST, 'noJemaat');
            $txtnamaJemaat = FILTER_INPUT(INPUT_POST, 'namaJemaat');
            $txttglMeninggal = FILTER_INPUT(INPUT_POST, 'tglMeninggal');
			$tglMeninggal = new DateTime($txttglMeninggal);
            $txtketerangan = FILTER_INPUT(INPUT_POST, 'keterangan');
            $txtlokasiPemakaman = FILTER_INPUT(INPUT_POST, 'lokasiPemakaman');
            $txttglPemakaman = FILTER_INPUT(INPUT_POST, 'tglPemakaman');
			$tglPemakaman = new DateTime($txttglPemakaman);
			$txtyangMelayani = FILTER_INPUT(INPUT_POST, 'yangMelayani');

            $addKematian = new Kematian();
            $addKematian->setNoJemaat($txtnoJemaat);
            $addKematian->setNamaJemaat($txtnamaJemaat);
            $addKematian->setTglMeninggal($txttglMeninggal);
            $addKematian->setKeterangan($txtketerangan);
            $addKematian->setLokasiPemakaman($txtlokasiPemakaman);
            $addKematian->setTglPemakaman($txttglPemakaman);
            $addKematian->setYangMelayani($txtyangMelayani);
            $msg = $this->kematianDaoImplement->insertKematian($addKematian);
        }
		$result = $this->kematianDaoImplement->fetchKematian();
        require_once 'data_kematian.php';
    }
}