<?php
class index_Model extends model{
	function __construct(){
		parent::__construct();
	}

	public function xhrInsertFcm(){
		try{
			$query = "UPDATE `user` SET `userFCM` = :fcm WHERE `user`.`userId` = :userid";
			$stmt = $this->db->prepare($query);
			if(!isset($_SESSION)) 
			{ 
				session_start(); 
			} 
			
			$userid = $_SESSION['userid']; 
			$status = $stmt->execute(array(
				":fcm"=>$_REQUEST['fcm'],
				":userid"=>$userid
			));
			if($status)
			{
				echo 1;
			}
			else
				echo 0;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
}