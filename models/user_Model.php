<?php
class user_Model extends model{
	function __construct(){
		parent::__construct();
	}

	

	function xhrNew(){
		try{
				$query = "INSERT INTO `tbladminuser` (`adminId`, `adminType`, `loginId`, `password`, `firstName`, `lastName`, `phoneNumber`, `usertype`, `status`) VALUES (NULL, NULL, :loginid, :password, :firstname, :lastname, :phonenumber, :usertype, :status)";
				$stmt = $this->db->prepare($query);
				$status = $stmt->execute(array(
					":loginid"=>$_REQUEST['loginId'],
					":password"=>$_REQUEST['password'],
					":firstname"=>$_REQUEST['fname'],
					":lastname"=>$_REQUEST['lname'],
					":phonenumber"=>$_REQUEST['contactNumber'],
					":usertype"=>$_REQUEST['userType'],
					":status"=>$_REQUEST['status']
				));
				if($status){
					echo 1;
				}
				else{
					echo 0;
				}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function xhrGetData(){
		try
		{
			$starting_position=0;
			$records_per_page = 10;

			if(!isset($_SESSION)) 
							{ 
							session_start(); 
							} 
							$userid =  $_SESSION['userid'];

			$uquery = "SELECT `usertype` FROM `tbladminuser` WHERE `adminId` = :id";
			$ustmt = $this->db->prepare($uquery);
			$ustmt->execute(array(
				":id"=>$userid
			));

			$urow = $ustmt->fetch(PDO::FETCH_ASSOC);

			$query = "SELECT * FROM `tbladminuser` WHERE 1";

			if($urow['usertype'] == 1){
				$query .=" AND `usertype` != 2";
			}

			if(isset($_REQUEST['searchtext']))
			{
				$searchtext = $_REQUEST['searchtext'];
				$query .= " AND (`firstName` like '%$searchtext%' OR `lastName` like '%searchtext%')";
			}
			
			if(isset($_REQUEST['activepage']))
			{
				if($_REQUEST['activepage']>0)
				{
					$starting_position=($_REQUEST["activepage"]-1)*$records_per_page;
				}
			}
			$query2 = $query;
			$query .=" limit $starting_position,$records_per_page";
			
			$stmt = $this->db->prepare($query);
			
			$stmt->execute();
			
			$row = array();
			if($stmt->rowCount()>0)
			{
				$row['success'] = 1;
				$irows = array();
				while($result = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					$irows[] = $result;
				}
				$row['data'] = $irows;

				$content = "";
				//echo $content;
				$content .= '<div class="pagination-wrap" align="center">';
				
				$fstmt = $this->db->prepare($query2);
				$fstmt->execute();
				
				$total_no_of_records = $fstmt->rowCount();
				if($total_no_of_records > 0)
				{
				$content .= '<ul class="pagination">';
				$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
				if(isset($_REQUEST['activePage']))
				{
					$current_page=$_REQUEST['activePage'];
					//echo $current_page;
				}
				else
					$current_page=1;
				$start = 1;
				if(isset($_REQUEST["activepage"]))
				{
					if($_REQUEST['activepage']>0)
					{
					$current_page=$_REQUEST["activepage"];
					}
				
				}
				
				if($current_page!=1)
				{
				$previous =$current_page-1;
				$content .= "<li><a id=".$start." class='spage'><span class='glyphicon glyphicon-backward'></span></a></li>";
				$content .= "<li><a id=".$previous." class='spage'><span class='glyphicon glyphicon-step-backward'></span></a></li>";
				}
				$count = 0;
				$current = 10;
				for($i=1;$i<=$total_no_of_pages;$i++)
				{
					
					if($i==$current_page)
					{
					$content .= "<li><a id=".$i." class='spage sid activePage'>".$i."</a></li>";
					}
					else
					{
						if($current_page > 10)
						{
							$count++;
							if($count <= 10)
							{
								
								$val = $current_page - $current;
								$current--;
								$content .= "<li><a id=".$val." class='spage'>".$val."</a></li>";
							}
						}
						else if($i <= 10)
						{
							$content .= "<li><a id=".$i." class='spage'>".$i."</a></li>";
						}
					}
				}
				if($current_page!=$total_no_of_pages)
				{
				$next=$current_page+1;
				$content .= "<li><a id=".$next." class='spage'><span class='glyphicon glyphicon-step-forward'></span></a></li>";
				$content .= "<li><a id=".$total_no_of_pages." class='spage'><span class='glyphicon glyphicon-forward'></span></a></li>";
				}
				$content .= '</ul>';
				}
				$content .= '</div>';
				$row['pagination'] = $content;
			}
			
			
			echo json_encode($row);
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	/*From Web*/
	public function xhrEditGetData($id){
		try{
				$query = "SELECT * FROM `tbladminuser` WHERE `adminId` = :id";
				$stmt = $this->db->prepare($query);
				$stmt->execute(array(
					":id"=>$id
				));
				$row = array();
				if($stmt->rowCount()>0){
					$row['success'] = 1;
					$irows = array();
					while($result = $stmt->fetch(PDO::FETCH_ASSOC))
					{
						$irows[] = $result;
					}
					$row['data'] = $irows;
				}
				echo json_encode($row);



		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}


	public function xhrSaveEditData(){
		try{
				$query = "UPDATE `tbladminuser` SET `loginId` = :loginid, `firstName` = :firstname, `lastName` = :lastname, `phoneNumber` = :phone, `usertype` = :usertype, `status` = :status WHERE `adminId` = :id";
				$stmt = $this->db->prepare($query);
				$status = $stmt->execute(array(
					":firstname"=>$_REQUEST['fname'],
					":lastname"=>$_REQUEST['lname'],
					":loginid"=>$_REQUEST['loginId'],
					":phone"=>$_REQUEST['contactNumber'],
					":usertype"=>$_REQUEST['userType'],
					":status"=>$_REQUEST['status'],
					":id"=>$_REQUEST['eid']
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

	public function xhrDeleteData(){
		try{
				$stmt = $this->db->prepare("DELETE FROM `tbladminuser` WHERE `adminId` = :id");
		$stmt->execute(array(
				':id'=>$_REQUEST['id']
		));
		echo 1;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

}