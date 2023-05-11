<?php
class functions_Model extends model{
	function __construct(){
		parent::__construct();
	}


	function xhrNew()
	{
		try{
				$query = "INSERT INTO `tbl_function` (`id`, `name`, `image`, `video`) VALUES (NULL, :name, :image, :video);";
				$stmt = $this->db->prepare($query);

				/*Image Upload*/
				
						$movieImage=$_FILES["movieImage"]["name"];
						$movieSize=$_FILES["movieImage"]["size"]/1024;
						$movieType=$_FILES["movieImage"]["type"];
						if($movieType == 'image/png' || $movieType == 'image/jpg' || $movieType == 'image/jpeg')
						{
							$movieName=$_FILES["movieImage"]["tmp_name"]; 
							//$uploadPath = "images/stock/".$loftyImage;
							//$dir = URL."public/images/stock/";
							if($movieType == 'image/png'){
								$ext = "png";
							}
							else if($movieType == 'image/jpg' || $movieType == 'image/jpeg'){
								$ext = "jpg";
							}
							$moviename = rand().".".$ext;
							
							$uploadmoviePath= $_SERVER["DOCUMENT_ROOT"]."/film/public/images/movie/".$moviename;
							$filename = "public/images/movie/".$moviename;

							if(move_uploaded_file($movieName,$uploadmoviePath))
							{
								
								$status = $stmt->execute(array(
								":name"=>$_REQUEST['movieName'],
								":image"=>$filename,
								":video"=>$_REQUEST['movieVideo']
								
								));
								$response = array();
								if($status)
									$response['success'] = 1;
								else
									$response['success'] = 0;
								
							}
							else
								$response['success'] = 2; // Image Upload Error;
						}
						else
							$response['success'] = 3; // Image Type Error;				

				
				echo json_encode($response);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	function xhrGetData(){
		try{
				$starting_position=0;
			$records_per_page = 10;

			$query = "SELECT * FROM `tbl_function` WHERE 1";

			//$stmt = $this->db->prepare($query);

			//$stmt->execute();


			//$query = "SELECT ts.storeId,ts.storeName,ts.storeImage,ts.storeAddress,ts.storePhoneNumber1,ts.storeAbout,ts.status,ct.categoryName,sc.subcatName  FROM `tblstore` ts INNER JOIN `tblcategory` ct INNER JOIN `tblsubcategory` sc ON ct.categoryId = ts.categoryId AND sc.id = ts.subcategoryId WHERE 1";

			if(isset($_REQUEST['searchtext']))
			{
				$searchtext = $_REQUEST['searchtext'];
				$query .= " AND name like '%$searchtext%'";
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
				$response['pagination'] = $content;
			}
			
			
			echo json_encode($response);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	function xhrChangeStatus(){
		try{
				$query = "UPDATE `tblstore` SET `status` = :status WHERE `storeId` = :id";
				$stmt = $this->db->prepare($query);
				$status = $stmt->execute(array(
					":status"=>$_REQUEST['status'],
					":id"=>$_REQUEST['id']
				));
				$response = array();
				if($status)
					$response['success'] = 1;
				else
					$response['success'] = 0;
				echo json_encode($response);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	function xhrEditGetData(){
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

	function xhrSaveEditData()
	{
			try{
					$query = "UPDATE `tbl_function` SET `name` = :name,`video` = :video";
					if($_REQUEST['imageChange'] == 1)
						$query .= ", `image` = :image";
					$query .= "  WHERE `id` = :id";
					$stmt = $this->db->prepare($query);

					
					if($_REQUEST['imageChange'] == 1)
					{
						/*Image Upload*/
					
							$movieImage=$_FILES["movieImage"]["name"];
							$movieSize=$_FILES["movieImage"]["size"]/1024;
							$movieType=$_FILES["movieImage"]["type"];
							if($movieType == 'image/png' || $movieType == 'image/jpg' || $movieType == 'image/jpeg')
							{
								$movieName=$_FILES["movieImage"]["tmp_name"]; 
								//$uploadPath = "images/stock/".$loftyImage;
								//$dir = URL."public/images/stock/";
								if($movieType == 'image/png'){
									$ext = "png";
								}
								else if($movieType == 'image/jpg' || $movieType == 'image/jpeg'){
									$ext = "jpg";
								}
								$moviename = rand().".".$ext;
								
								$uploadmoviePath= $_SERVER["DOCUMENT_ROOT"]."/film/public/images/movie/".$moviename;
								$filename = "public/images/movie/".$moviename;
								if(move_uploaded_file($movieName,$uploadmoviePath))
								{


								$status = $stmt->execute(array(
									":name"=>$_REQUEST['movieName'],
									":image"=>$filename,
								":video"=>$_REQUEST['movieVideo'],	
								":id"=>$_REQUEST['movieId']
								));
								}
							}
					}
					else{
							$status = $stmt->execute(array(
									":name"=>$_REQUEST['movieName'],
								":video"=>$_REQUEST['movieVideo'],
								":id"=>$_REQUEST['movieId']
								));
					}
					$response = array();
					if($status)
						$response['success'] = 1;
					else
						$response['success'] = 0;
					echo json_encode($response);

			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
		

	}

	function xhrDeleteData(){
		try{
				$query = "DELETE FROM `tbl_function` WHERE `id` = :id";
				$stmt = $this->db->prepare($query);
				$status = $stmt->execute(array(
					":id"=>$_REQUEST['movieId']
				));
				$response = array();
				$response['success'] = 1;
				echo json_encode($response);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	
}