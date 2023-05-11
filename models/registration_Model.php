<?php
class registration_Model extends model{
	function __construct(){
		parent::__construct();
	}

	function xhrNew(){
		try{

			$dob = strtr($_REQUEST['dob'], '/', '-');
		    					$dob=date('Y-m-d',strtotime($dob));

			$query = "INSERT INTO `tbl_user` (`id`, `name`, `email`, `dob`, `mobile`, `loginid`, `password`) VALUES (NULL, :name, :email, :dob, :mobile, :loginid, :password)";
			$stmt = $this->db->prepare($query);
			$status = $stmt->execute(array(
				":name"=>$_REQUEST['name'],
				":email"=>$_REQUEST['email'],
				":dob"=>$dob,
				":mobile"=>$_REQUEST['mobile'],
				":loginid"=>$_REQUEST['loginid'],
				":password"=>$_REQUEST['loginpass']
			));
			if($status){
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
?>