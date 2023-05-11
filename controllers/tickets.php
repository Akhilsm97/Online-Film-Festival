<?php
class Tickets extends Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->view->render('tickets');
	}
	
	function xhrGetFunctionData(){
		$this->model->xhrGetFunctionData();
	}

	function xhrGetMovieData(){
		$this->model->xhrGetMovieData();
	}

	function xhrChangeMovieStatus(){
		$this->model->xhrChangeMovieStatus();
	}
}