<?php
class Userhome extends Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->view->render('userhome');
	}

	function xhrCancelTicket(){
		$this->model->xhrCancelTicket();
	}

	function xhrGetAllMovie(){
		$this->model->xhrGetAllMovie();
	}

	function xhrGetMovieData(){
		$this->model->xhrGetMovieData();
	}

	function xhrGetFunctionData(){
		$this->model->xhrGetFunctionData();
	}

	function xhrGetMovieDataById(){
		$this->model->xhrGetMovieDataById();
	}

	function xhrGetFunctionDataById(){
		$this->model->xhrGetFunctionDataById();
	}

	function xhrNewMovieBooking(){
		$this->model->xhrNewMovieBooking();
	}

	function xhrNewFunctionBooking(){
		$this->model->xhrNewFunctionBooking();
	}

	function xhrGetMovieStatus(){
		$this->model->xhrGetMovieStatus();
	}

	function xhrGetFunctionStatus(){
		$this->model->xhrGetFunctionStatus();
	}

	function xhrNewQuestion(){
		$this->model->xhrNewQuestion();
	}

	function xhrGetResponse(){
		$this->model->xhrGetResponse();
	}

	function xhrScreenPoll(){
		$this->model->xhrScreenPoll();
	}


}
?>