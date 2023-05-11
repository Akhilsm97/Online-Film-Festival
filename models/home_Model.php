<?php
class home_Model extends model{
	function __construct(){
		parent::__construct();
	}

	public function xhrLogin(){
		try{
				$query = "SELECT * FROM `tbl_user` where `loginid` = :useremail";
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
							$_SESSION['username'] = $row['name'];
							$_SESSION['userid'] = $row['id'];
							$userid = $_SESSION['userid'];
							

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