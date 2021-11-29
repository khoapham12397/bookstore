<?php 
	session_start();

	$rootDir = $_SERVER['DOCUMENT_ROOT'];
	include_once $rootDir."/bookstore/model/commentDAO.php";
	include_once $rootDir."/bookstore/model/userDAO.php";

	if(isset($_POST['action'])){
		$action = $_POST['action'];
			
		switch($action){

		case "add":
			if(isset($_SESSION['logined_member'])){
				$id = $_SESSION["logined_member"]["id"];
				$ustate = getStateOfUser($id)['state'];

				if($ustate > 1){
				echo json_encode(["code"=>0 , "message"=> "You are blocked to comment by admin"]);
				}else{
					$content = $_POST['content'];
					$product_id = $_POST['product_id'];

					try {
						insertComment($id, $product_id, $content, 0, $_SESSION['logined_member']['username']);
						echo json_encode(["code"=>1]);
						} catch(PDOException $ex){
							echo json_encode(["code"=>0, "message" =>  $ex->getMessage()]);
						}
					}
				}
				else 
					echo json_encode(["code"=>0, "message"=>"You must login before"]);
							
			break;

		case "change_state":
			if(isset($_SESSION["logined_admin"])){
				$comment_id = $_POST['comment_id'];
				$state = $_POST['comment_state'];
				try{
					changeState($comment_id, $state);
					echo json_encode(["code"=>1]);
				}catch(PDOException $ex){
					echo json_encode(["code"=>0,"message"=>"Error"]);
				}
			}
			else json_encode(["code"=>0, "message"=>"You must login before"]);
			
			break;
		}
		
	}	
	else if(isset($_GET['action'])){
		$action = $_GET['action'];
		
		switch($action){	

		case "get_pending_comments":

			if(isset($_SESSION["logined_admin"])){
				try{	
					$comments = get_wait_comments();
					echo json_encode(["data"=> $comments,"code"=>1],JSON_UNESCAPED_UNICODE);

				}catch(PDOException $ex){
					echo json_encode(["code"=>0,"message"=>"Error"]);
				}
			}
			else 
				echo json_encode(["code"=>0,"message"=>"You must login before"]);

			break;
			
			default :
				echo json_encode(["code"=>0]);
				break; 
		}
		
	}
	
?>