<?php
class Kelahiran
{
    private $idKelahiran;
    private $noAkte;
    private $namaAyah;
    private $namaIbu;
    private $namaAnak;
    private $jk;
    private $tglLahir;
    private $goldar;
    private $namaPelapor;
    private $tglPelapor;
	
    function getIdKelahiran()
    {
        return $this->idKelahiran;
    }
    function getNoAkte()
    {
        return $this->noAkte;
    }
    function getNamaAyah()
    {
        return $this->namaAyah;
    }
    function getNamaIbu()
    {
        return $this->namaIbu;
    }
    function getNamaAnak()
    {
        return $this->namaAnak;
    }
    function getJk()
    {
        return $this->jk;
    }
    function getTglLahir()
    {
        return $this->tglLahir;
    }
    function getGoldar()
    {
        return $this->goldar;
    }
    function getNamaPelapor()
    {
        return $this->namaPelapor;
    }
    function getTglPelapor()
    {
        return $this->tglPelapor;
    }

    function setIdKelahiran($idKelahiran)
    {
        $this->idKelahiran = $idKelahiran;
    }
    function setNoAkte($noAkte)
    {
        $this->noAkte = $noAkte;
    }
    function setNamaAyah($namaAyah)
    {
        $this->namaAyah = $namaAyah;
    }
    function setNamaIbu($namaIbu)
    {
        $this->namaIbu = $namaIbu;
    }
    function setNamaAnak($namaAnak)
    {
        $this->namaAnak = $namaAnak;
    }
    function setJk($jk)
    {
        $this->jk = $jk;
    }
    function setTglLahir($tglLahir)
    {
        $this->tglLahir = $tglLahir;
    }
    function setGoldar($goldar)
    {
        $this->goldar = $goldar;
    }
    function setNamaPelapor($namaPelapor)
    {
        $this->namaPelapor = $namaPelapor;
    }
    function setTglPelapor($tglPelapor)
    {
        $this->tglPelapor = $tglPelapor;
    }
}