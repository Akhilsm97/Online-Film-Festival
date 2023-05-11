<?php
class login_Model extends model{
	function __construct(){
		parent::__construct();
	}

	public function xhrLogin(){
		try{
				$query = "SELECT * FROM `tbladminuser` where `loginId` = :useremail";
				$stmt = $this->db->prepare($query);
				$stmt->execute(array(
						":useremail"=>$_REQUEST['loginid']
				));
				if($stmt->rowCount()>0){
						$row = $stmt->fetch(PDO::FETCH_ASSOC);
						if($row['password'] == $_REQUEST['loginpass']){
							if(!isset($_SESSION)) 
							{ 
							session_start(); 
							} 
							$_SESSION['username'] = $row['firstName']." ".$row['lastName'];
							$_SESSION['userid'] = $row['adminId'];
							$_SESSION['usertype'] = $row['usertype'];
							$userid = $_SESSION['userid'];
							/*$uquery = "UPDATE `user` SET `loginStatus` = '1' WHERE `user`.`userId` = :userid";
							$ustmt = $this->db->prepare($uquery);
							$ustmt->execute(array(
								":userid"=>$userid
							));*/

							echo 1;
						}
						else
						{
							echo 0;
						}
				}
				else
				{
						echo 0;
				}
		}
		catch(PDOException $e){
				echo $e->getMessage();
		}
	}

	public function xhrLogout()
	{
		if(!isset($_SESSION)) 
							{ 
							session_start(); 
							} 
				session_destroy();
				echo 1;
	}

	
}
?>