<?php
class Login extends Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->view->render('login');
	}

	public function xhrLogin(){
		$this->model->xhrLogin();
	}

	

	public function xhrLogout(){
		$this->model->xhrLogout();
	}
}
?>