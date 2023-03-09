<?php
class AtestasiMasuk
{
    private $idAtestasiM;
    private $noAtestasi;
    private $tglPengajuan;
    private $namaLengkap;
    private $alamat;
    private $email;
    private $noTelp;
    private $noWA;
    private $agama;
    private $gerejaAsal;
    private $status;
    private $pasFoto;
    private $scanAkteBaptisSidi;
    private $suratKeterangan;
	
    function getIdAtestasiM()
    {
        return $this->idAtestasiM;
    }
    function getNoAtestasi()
    {
        return $this->noAtestasi;
    }
    function getTglPengajuan()
    {
        return $this->tglPengajuan;
    }
    function getNamaLengkap()
    {
        return $this->namaLengkap;
    }
    function getAlamat()
    {
        return $this->alamat;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getNoTelp()
    {
        return $this->noTelp;
    }
    function getNoWA()
    {
        return $this->noWA;
    }
    function getAgama()
    {
        return $this->agama;
    }
    function getGerejaAsal()
    {
        return $this->gerejaAsal;
    }
	function getStatus()
    {
        return $this->status;
    }
	function getPasFoto()
    {
        return $this->pasFoto;
    }
	function getScanAkteBaptisSidi()
    {
        return $this->scanAkteBaptisSidi;
    }
	function getSuratKeterangan()
    {
        return $this->suratKeterangan;
    }

    function setIdAtestasiM($idAtestasiM)
    {
        $this->idAtestasiM = $idAtestasiM;
    }
    function setNoAtestasi($noAtestasi)
    {
        $this->noAtestasi = $noAtestasi;
    }
    function setTglPengajuan($tglPengajuan)
    {
        $this->tglPengajuan = $tglPengajuan;
    }
    function setNamaLengkap($namaLengkap)
    {
        $this->namaLengkap = $namaLengkap;
    }
    function setAlamat($alamat)
    {
        $this->alamat = $alamat;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }
    function setNoTelp($noTelp)
    {
        $this->noTelp = $noTelp;
    }
    function setNoWA($noWA)
    {
        $this->noWA = $noWA;
    }
    function setAgama($agama)
    {
        $this->agama = $agama;
    }
    function setGerejaAsal($gerejaAsal)
    {
        $this->gerejaAsal = $gerejaAsal;
    }
	function setStatus($status)
    {
        $this->status = $status;
    }
	function setPasFoto($pasFoto)
    {
        $this->pasFoto = $pasFoto;
    }
	function setScanAkteBaptisSidi($scanAkteBaptisSidi)
    {
        $this->scanAkteBaptisSidi = $scanAkteBaptisSidi;
    }
	function setSuratKeterangan($suratKeterangan)
    {
        $this->suratKeterangan = $suratKeterangan;
    }
}