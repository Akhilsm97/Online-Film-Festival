<?php
class Screenpoll extends Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->view->render('screenpoll');
	}

	function xhrGetData(){
		$this->model->xhrGetData();
	}

	function xhrChangeScreen(){
		$this->model->xhrChangeScreen();
	}
}
?>