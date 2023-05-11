<?php
class Doubts extends Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->view->render('doubts');
	}

	function xhrGetData(){
		$this->model->xhrGetData();
	}

	function xhrNewAnswer(){
		$this->model->xhrNewAnswer();
	}
}
?>