<?php
class userhome_Model extends model{
	function __construct(){
		parent::__construct();
	}

	function xhrGetAllMovie(){
		try{

			$query = "SELECT * FROM `tbl_movie`";
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$response = array();
			if($stmt->rowCount()>0)
			{

				$response['success'] = 1;
				$response['data'] = array();
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					$tmp = array();
					$tmp['movie'] = $row['name'];
					$tmp['id'] = $row['id'];
					array_push($response['data'], $tmp);
				}
			}
			else{
				$response['success'] = 0;
			}
			echo json_encode($response);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	function xhrScreenPoll(){
		try{
				/*$query = "UPDATE `tbl_screen` SET `poll` = `poll`+1 WHERE `id` = :id";
				$stmt = $this->db->prepare($query);
				$status = $stmt->execute(array(
					":id"=>$_REQUEST['screenId']
				));
				if($status){
					echo 1;
				}
				else
					echo 0;*/

				/*$query = "UPDATE `tbl_movie` SET `poll` = `poll`+1 WHERE `id` = :id";
				$stmt = $this->db->prepare($query);
				$status = $stmt->execute(array(
					":id"=>$_REQUEST['movieid']
				));
				if($status){
					echo 1;
				}
				else
					echo 0;*/

				$uquery = "SELECT * FROM `tbl_screen_poll` WHERE `screen` = :screen AND `movie` =:movie";
				$ustmt = $this->db->prepare($uquery);
				$ustmt->execute(array(
					":screen"=>$_REQUEST['screen'],
					":movie"=>$_REQUEST['movie']
				));
				if($ustmt->rowCount()>0)
				{
					$row = $ustmt->fetch(PDO::FETCH_ASSOC);
					$id = $row['id'];
					$upquery = "UPDATE `tbl_screen_poll` SET `poll` = `poll`+1 WHERE `id` = :id";
					$upstmt = $this->db->prepare($upquery);
					$upstmt->execute(array(
						":id"=>$id
					));
				}
				else
				{
				$query = "INSERT INTO `tbl_screen_poll` (`id`, `screen`, `movie`, `poll`) VALUES (NULL, :screen, :movie, 1)";
				$stmt = $this->db->prepare($query);
				$stmt->execute(array(
					":screen"=>$_REQUEST['screen'],
					":movie"=>$_REQUEST['movie']
				));
				}
				echo 1;

		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	function xhrGetResponse(){
		try{
				$starting_position=0;
			$records_per_page = 10;

			$query = "SELECT * FROM `tbl_doubts` WHERE `userid` = :userid";

			if(!isset($_SESSION)) 
							{ 
							session_start(); 
							} 
							$userid = $_SESSION['userid'];
			
			
			
			$stmt = $this->db->prepare($query);
			
			$stmt->execute(array(
				":userid"=>$userid
			));
			
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

	function xhrNewQuestion(){
		try{
				$query = "INSERT INTO `tbl_doubts` (`id`, `userid`, `question`, `answer`) VALUES (NULL, :userid, :question, NULL)";
				$stmt = $this->db->prepare($query);
				if(!isset($_SESSION)) 
							{ 
							session_start(); 
							} 
							$userid = $_SESSION['userid'];
				$status = $stmt->execute(array(
					":userid"=>$userid,
					":question"=>$_REQUEST['question']
				));
				if($status){
					echo 1;
				}
				else
					echo 0;
		}
		catch(PODException $e){
			echo $e->getMessage();
		}
	}

	function xhrGetMovieData(){
		try{
				

			$query = "SELECT * FROM `tbl_movie` WHERE 1";
			
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

	function xhrGetMovieDataById(){
		try{
				$query = "SELECT * FROM `tbl_movie` WHERE `id` = :id";
				$stmt = $this->db->prepare($query);
				$stmt->execute(array(
					":id"=>$_REQUEST['id']
				));
				$response = array();
				$response['success'] = 1;
				//$irows = array();
				$response['data'] = array();
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					$tmp = array();
					$tmp['cast_crew'] = $row['cast_crew'];
					$tmp['id'] = $row['id'];
					$tmp['image'] = $row['image'];
					$tmp['name'] = $row['name'];
					$tmp['screen'] = $row['screen'];
					$tmp['video'] = $row['video'];
					$movieid = $row['id'];
					$cquery = "SELECT sum(`no_tickets`) as sumTickets FROM `tbl_ticket` WHERE `showId` = :id AND `cancel` != 1";
					$cstmt = $this->db->prepare($cquery);
					$cstmt->execute(array(
						":id"=>$movieid
					));
					$crow = $cstmt->fetch(PDO::FETCH_ASSOC);
					if($crow['sumTickets'] != NULL)
						$tmp['ticket'] = 20-$crow['sumTickets'];
					else
						$tmp['ticket'] = 20;

					array_push($response['data'],$tmp);
				}
				//$response['data'] = $irows;
				echo json_encode($response);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	function xhrGetFunctionDataById(){
		try{
				$query = "SELECT * FROM `tbl_function` WHERE `id` = :id";
				$stmt = $this->db->prepare($query);
				$stmt->execute(array(
					":id"=>$_REQUEST['id']
				));
				$response = array();
				$response['success'] = 1;
				$irows = array();
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					$irows[] = $row;
				}
				$response['data'] = $irows;
				echo json_encode($response);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	function xhrGetFunctionData(){
		try{
				

			$query = "SELECT * FROM `tbl_function` WHERE 1";
			
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

				
				$response['pagination'] = $content;
			}
			
			
			echo json_encode($response);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	function xhrNewMovieBooking(){
		try{
				if(!isset($_SESSION)) 
							{ 
							session_start(); 
							} 
							$userid = $_SESSION['userid'];
				$query = "INSERT INTO `tbl_ticket` (`id`, `userid`, `showId`, `no_tickets`, `ticket_type`, `payment`, `status`) VALUES (NULL, :userid, :showid, :ticket, '1', :payment,  '0')";

				if(!empty($_REQUEST['moviePayment'])){
					$payment = $_REQUEST['moviePayment'];
				}
				else
					$payment = 0;
				$stmt = $this->db->prepare($query);
				$status = $stmt->execute(array(
					":userid"=>$userid,
					":showid"=>$_REQUEST['movieid'],
					":ticket"=>$_REQUEST['ticket'],
					":payment"=>$payment
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

	function xhrNewFunctionBooking(){
		try{
				if(!isset($_SESSION)) 
							{ 
							session_start(); 
							} 
							$userid = $_SESSION['userid'];
				$query = "INSERT INTO `tbl_ticket` (`id`, `userid`, `showId`, `no_tickets`, `ticket_type`, `status`) VALUES (NULL, :userid, :showid, :ticket, '2', '0')";
				$stmt = $this->db->prepare($query);
				$status = $stmt->execute(array(
					":userid"=>$userid,
					":showid"=>$_REQUEST['movieid'],
					":ticket"=>$_REQUEST['ticket']
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

	function xhrCancelTicket(){
		try{
				$query = "UPDATE `tbl_ticket` SET `cancel` = '1' WHERE `id` = :id";
				$stmt = $this->db->prepare($query);
				$status =  $stmt->execute(array(
					":id"=>$_REQUEST['id']
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


	function xhrGetMovieStatus(){
		try
		{
				
			$query = "SELECT tt.id,tm.name,tt.ref,tt.status,tt.cancel FROM `tbl_ticket` tt INNER JOIN `tbl_movie` tm ON tt.showId = tm.id WHERE tt.`userid` = :userid AND tt.`ticket_type` = 1";

			if(!isset($_SESSION)) 
							{ 
							session_start(); 
							} 
							
							$userid = $_SESSION['userid'];
			
			$stmt = $this->db->prepare($query);
			$stmt->execute(array(
				":userid"=>$userid
			));
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

	function xhrGetFunctionStatus(){
				
		try{
			$query = "SELECT * FROM `tbl_ticket` tt INNER JOIN `tbl_function` tm ON tt.showId = tm.id WHERE tt.`userid` = :userid AND tt.`ticket_type` = 2";

			if(!isset($_SESSION)) 
							{ 
							session_start(); 
							} 
							
							$userid = $_SESSION['userid'];
			
			$stmt = $this->db->prepare($query);
			$stmt->execute(array(
				":userid"=>$userid
			));
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