<?php
class screenpoll_Model extends model{
	function __construct(){
		parent::__construct();
	}

	function xhrChangeScreen(){
		try{
				$query = "UPDATE `tbl_movie` SET `screen` = :screen WHERE `id` = :id";
				$stmt = $this->db->prepare($query);
				$status = $stmt->execute(array(
					":screen"=>$_REQUEST['screenNo'],
					":id"=>$_REQUEST['movieId']
				));
				if($status)
					echo 1;
				else
					echo 0;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	function xhrGetData(){
		try{
			$starting_position=0;
			$records_per_page = 10;

			$query = "SELECT tm.name,tp.screen,tp.poll FROM `tbl_screen_poll` tp INNER JOIN `tbl_movie` tm WHERE tp.movie = tm.id";

			
			$stmt = $this->db->prepare($query);
			
			$stmt->execute();
			
			$response = array();
			if($stmt->rowCount()>0)
			{
				$response['success'] = 1;
				$irows = array();
				while($result = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					//if($result['categoryId'])
					$irows[] = $result;
				}
				$response['data'] = $irows;

				
			}
			
			
			echo json_encode($response);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
}
?>