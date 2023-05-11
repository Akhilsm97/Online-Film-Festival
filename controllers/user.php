<?php
class User extends Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->view->render('user');
	}

	function xhrNew(){
		$this->model->xhrNew();
	}

	function xhrGetData(){
		$this->model->xhrGetData();
	}

	function xhrEditGetData($id){
		$this->model->xhrEditGetData($id);
	}

	function xhrSaveEditData(){
		$this->model->xhrSaveEditData();
	}

	function xhrDeleteData(){
		$this->model->xhrDeleteData();
	}

	function xhrAddNewUser(){
		$this->model->xhrAddNewUser();
	}

	function xhrUserLogin(){
		$this->model->xhrUserLogin();
	}
}