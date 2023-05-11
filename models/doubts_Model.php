<?php
class doubts_Model extends model{
	function __construct(){
		parent::__construct();
	}

	function xhrGetData(){
		try{
				$starting_position=0;
			$records_per_page = 10;

			$query = "SELECT td.id,td.question,td.answer,tu.name FROM `tbl_doubts` td INNER JOIN `tbl_user` tu ON td.userid = tu.id WHERE 1";

			
			
			
			
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

	function xhrNewAnswer(){
		try{
			$query = "UPDATE `tbl_doubts` SET `answer` = :answer WHERE `id` = :id";
			$stmt = $this->db->prepare($query);
			$status = $stmt->execute(array(
				":answer"=>$_REQUEST['answer'],
				":id"=>$_REQUEST['doubtsId']
			));
			if($status)
				echo 1;
			else
				echo 0;
		}
		catch(PDOExceptin $e){
			echo $e->getMessage();
		}
	}
}
?>