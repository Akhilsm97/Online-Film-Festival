<?php
class Screen extends Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->view->render('screen');
	}

	function xhrGetData(){
		$this->model->xhrGetData();
	}

	function xhrChangeScreen(){
		$this->model->xhrChangeScreen();
	}
}
?>