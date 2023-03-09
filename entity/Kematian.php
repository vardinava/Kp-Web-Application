<?php
class Kematian
{
    private $idKematian;
    private $noJemaat;
    private $namaJemaat;
    private $tglMeninggal;
    private $keterangan;
    private $lokasiPemakaman;
    private $tglPemakaman;
    private $yangMelayani;
	
    function getIdKematian()
    {
        return $this->idKematian;
    }
    function getNoJemaat()
    {
        return $this->noJemaat;
    }
    function getNamaJemaat()
    {
        return $this->namaJemaat;
    }
    function getTglMeninggal()
    {
        return $this->tglMeninggal;
    }
    function getKeterangan()
    {
        return $this->keterangan;
    }
    function getLokasiPemakaman()
    {
        return $this->lokasiPemakaman;
    }
    function getTglPemakaman()
    {
        return $this->tglPemakaman;
    }
    function getYangMelayani()
    {
        return $this->yangMelayani;
    }

    function setIdKematian($idKematian)
    {
        $this->idKematian = $idKematian;
    }
    function setNoJemaat($noJemaat)
    {
        $this->noJemaat = $noJemaat;
    }
    function setNamaJemaat($namaJemaat)
    {
        $this->namaJemaat = $namaJemaat;
    }
    function setTglMeninggal($tglMeninggal)
    {
        $this->tglMeninggal = $tglMeninggal;
    }
    function setKeterangan($keterangan)
    {
        $this->keterangan = $keterangan;
    }
    function setLokasiPemakaman($lokasiPemakaman)
    {
        $this->lokasiPemakaman = $lokasiPemakaman;
    }
    function setTglPemakaman($tglPemakaman)
    {
        $this->tglPemakaman = $tglPemakaman;
    }
    function setYangMelayani($yangMelayani)
    {
        $this->yangMelayani = $yangMelayani;
    }
}