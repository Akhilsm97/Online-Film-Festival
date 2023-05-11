<?php
class tickets_Model extends model{
	function __construct(){
		parent::__construct();
		$this->year = DATE('Y');
	}



	function xhrGetMovieData(){
		try{
				$starting_position=0;
			$records_per_page = 10;

			$query = "SELECT  tu.name as username,tt.no_tickets as ticket, tt.payment as payment, tm.name as movie, tt.id as id, tt.status as status FROM `tbl_ticket` tt INNER JOIN `tbl_user` tu INNER JOIN `tbl_movie` tm ON tu.id = tt.userid AND tt.showId = tm.id WHERE tt.`ticket_type` = 1 ";

			if(isset($_REQUEST['searchtext']))
			{
				$searchtext = $_REQUEST['searchtext'];
				$query .= " AND tm.name like '%$searchtext%'";
			}
			
			
			
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

	function xhrGetFunctionData(){
		try{
				$starting_position=0;
			$records_per_page = 10;

			$query = "SELECT  tu.name as username,tt.no_tickets as ticket, tm.name as function, tt.id as id, tt.status as status FROM `tbl_ticket` tt INNER JOIN `tbl_user` tu INNER JOIN `tbl_function` tm ON tu.id = tt.userid AND tt.showId = tm.id WHERE tt.`ticket_type` = 2 ";

			if(isset($_REQUEST['searchtext']))
			{
				$searchtext = $_REQUEST['searchtext'];
				$query .= " AND tm.name like '%$searchtext%'";
			}
			
			
			
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

	function xhrChangeMovieStatus(){
		try{

				$uquery = "SELECT * FROM `tbl_ticket` WHERE `id` = :id";
				$ustmt = $this->db->prepare($uquery);
				$ustmt->execute(array(
					":id"=>$_REQUEST['ticketid']
				));
				$row = $ustmt->fetch(PDO::FETCH_ASSOC);
				
				if($row['payment'] != 0)
				{
					$squery = "SELECT * FROM `tbl_ticket` WHERE `payment` != 0 AND `id` != :id ORDER BY id DESC LIMIT 1";
					$sstmt = $this->db->prepare($squery);
					$sstmt->execute(array(
						":id"=>$_REQUEST['ticketid']
					));
					if($sstmt->rowCount()>0)
					{
						$srow = $sstmt->fetch(PDO::FETCH_ASSOC);
						if($srow['ref'] != NULL)
						{
						
						$myref = $srow['ref'];
						$myref = explode("/",$myref);
						//print_r($myref);
						$myref = ++$myref[1];
						//echo $myref;
						$ref = $this->year."/".$myref;
						//echo $ref;
						}
						else
						{
							$ref = $this->year."/1";
						}
					}
					else{
						$ref = $this->year."/1";
					}
				}
				else{
					$ref = NULL;
				}

				$query = "UPDATE `tbl_ticket` SET `status` = :status,`ref` = :ref WHERE `id` = :id";
				$stmt = $this->db->prepare($query);
				$status = $stmt->execute(array(
					":status"=>$_REQUEST['status'],
					":id"=>$_REQUEST['ticketid'],
					":ref"=>$ref
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