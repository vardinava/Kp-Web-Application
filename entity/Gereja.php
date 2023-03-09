<?php
class Gereja
{
    private $idGereja;
    private $nama;
	private $alamat;
    function getIdGereja()
    {
        return $this->idGereja;
    }
    function getNama()
    {
        return $this->nama;
    }
	function getAlamat()
    {
        return $this->alamat;
    }
    
    function setIdGereja($idGereja)
    {
        $this->idGereja = $idGereja;
    }
    function setNama($nama)
    {
        $this->nama = $nama;
    }
	function setAlamat($alamat)
    {
        $this->alamat = $alamat;
    }
	
    public function __set($name, $value) {
        if (isset($value)) {
            switch ($name) {
                case 'ID_Gereja' :
                    $this->setIdGereja($value);
                    break;
                case 'nama' :
                    $this->setNama($value);
                    break;
				case 'alamat' :
                    $this->setAlamat($value);
                    break;
                default :
                    break;
            }
        }
    }
}