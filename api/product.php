<?php 
	session_start();
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
	include_once $rootDir."/bookstore/model/productDAO.php";

	if(isset($_SESSION['logined_admin'])){
		switch($_POST['action']){
			case "add":
				$book = json_decode($_POST['book'],JSON_UNESCAPED_UNICODE);
				try{
					insertProduct($book);	
					echo json_encode(["code"=>1]);
				}catch(PDOException $ex){
					echo json_encode(["code"=>0,"message"=>$ex->getMessage()]);
				}		
				break;
			case "update":
				$type = $_POST['type'];
				if($type == 'partial'){
					$field = $_POST["field"];
					$value = $_POST['value'];
					$pid = $_POST['pid'];
					$conn = DB::getInstance();

					$sql = "update tb_book set ".$field." = '".$value."' where id = ".$pid;
					try{
						$stmt= $conn->prepare($sql);
						$stmt->execute();
						echo json_encode(["code"=>1]);
					}catch(PDOException $ex){
						echo json_encode(["code"=>0,"message"=>$ex->getMessage()]);
					}
				}
				else if($type=='all'){
					$book = json_decode($_POST['book'], JSON_UNESCAPED_UNICODE);
					try{
						updateProduct($book);
						echo json_encode(["code"=>1]);
					}catch(PDOException $ex){
						echo json_encode(["code"=>0,"message"=>$ex->getMessage()]);
					}
				}
				break;
		}		 		
	}
	else json_encode(["code"=>0, "message"=>"Not have permission"]);
?>