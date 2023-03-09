<?php
class UserController {

    private $UserDaoImplement;

    function __construct() {
        $this->UserDaoImplement = new UserDaoImpl();
    }

    //untuk proses setelah login
    public function afterLogin() {
        require_once './user/home.php';
    }
	
	public function beforeLogin(){
		require_once '.user/login.php';
	}

    //untuk proses login
    public function userLogin() {
       $btnLogin = FILTER_INPUT(INPUT_POST, 'btnlogin');
        if ($btnLogin) {
			$userDao = new UserDaoImpl();
			$username = FILTER_INPUT(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
			$password = FILTER_INPUT(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
			$userLogin = new User();
			$userLogin->setUsername($username);
			$userLogin->setPassword($password);
			$result = $this->UserDaoImplement->login($userLogin);
			if ($result != null && $result->getUsername() == $username) {
			   $_SESSION['uname'] = $result->getUsername();
               $_SESSION['userid'] = $result->getIdUser();
               $_SESSION['nama']= $result->getNama();
			   $_SESSION['role']= $this->UserDaoImplement->namaRole($this->UserDaoImplement->getIdRole($_SESSION['userid']));
               $_SESSION['my_session'] = TRUE;
               $_SESSION['approved_user'] = TRUE;
			}
            header('location:index.php');
        }
        require_once 'login.php';
    }
	public function userLogout(){
        session_unset();
        session_destroy();
        header("location:index.php");
    }

}