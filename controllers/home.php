<?php
class Home extends Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->view->render('home');
	}

	function xhrLogin(){
		$this->model->xhrLogin();
	}
}
?>