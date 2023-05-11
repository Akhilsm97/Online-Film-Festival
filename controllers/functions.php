<?php
class Functions extends Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->view->render('functions');
	}
	function xhrNew(){
		$this->model->xhrNew();
	}
	function xhrGetData(){
		$this->model->xhrGetData();
	}
	function xhrChangeStatus(){
		$this->model->xhrChangeStatus();
	}
	function xhrEditGetData(){
		$this->model->xhrEditGetData();
	}
	function xhrSaveEditData(){
		$this->model->xhrSaveEditData();
	}
	function xhrDeleteData(){
		$this->model->xhrDeleteData();
	}

	
}