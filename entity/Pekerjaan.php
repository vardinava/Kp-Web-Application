<?php
class Pekerjaan
{
    private $idPekerjaan;
    private $nama;
    function getIdPekerjaan()
    {
        return $this->idPekerjaan;
    }
    function getNama()
    {
        return $this->nama;
    }
    
    function setIdPekerjaan($idPekerjaan)
    {
        $this->idPekerjaan = $idPekerjaan;
    }
    function setNama($nama)
    {
        $this->nama = $nama;
    }
	
    public function __set($name, $value) {
        if (isset($value)) {
            switch ($name) {
                case 'ID_PEKERJAAN' :
                    $this->setIdPekerjaan($value);
                    break;
                case 'pekerjaan' :
                    $this->setNama($value);
                    break;
                default :
                    break;
            }
        }
    }
}