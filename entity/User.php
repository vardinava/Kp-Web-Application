<?php

class User {

    private $id_user;
    private $nama;
    private $username;
    private $password;
	private $id_role;
    private $foto;
    private $status;
    
	public function __construct(){		
	}
	
	/**
	* @return mixed
	*/
    function getIdUser() {
        return $this->id_user;
    }
	/**
	* @return mixed
	*/
    function getId_role(){
        return $this->id_role;
    }
	/**
	* @return mixed
	*/
    function getUsername() {
        return $this->username;
    }
	/**
	* @return mixed
	*/
    function getPassword() {
        return $this->password;
    }
	/**
	* @return mixed
	*/
    function getNama() {
        return $this->nama;
    }
	/**
	* @return mixed
	*/
    function getFoto() {
        return $this->nama;
    }
	/**
	* @return mixed
	*/
    function getStatus() {
        return $this->nama;
    }
	
	
	/**
	* @param mixed $id_user
	*/
    function setIdUser($id_user) {
        $this->id_user = $id_user;
    }
	/**
	* @param mixed $username
	*/
    function setUsername($username) {
        $this->username = $username;
    }
	/**
	* @param mixed $password
	*/
    function setPassword($password) {
        $this->password = $password;
    }
	/**
	* @param mixed $nama
	*/
    function setNama($nama) {
        $this->nama = $nama;
    }
	/**
	* @param mixed $foto
	*/
    function setFoto($foto) {
        $this->foto = $foto;
    }
	/**
	* @param mixed $status
	*/
    function setStatus($status) {
        $this->status = $status;
    }
	/**
	* @param mixed $id_role
	*/
    function setIdRole($id_role){
        $this->id_role = $id_role;
    }

}
