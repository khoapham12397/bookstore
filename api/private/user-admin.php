<?php  
	session_start();
	if(isset($_SESSION['logined_admin'])){
		$rootDir = $_SERVER['DOCUMENT_ROOT'];
		include_once $rootDir."/bookstore/model/userDAO.php";	
		$action = $_POST['action'];
		switch($action){
			case 'block_comment':
				$uid = $_POST['user_id'];
				try{
					setStateUser($uid, 2);
					echo json_encode(["code"=>1]);
				}catch(PDOException $ex){
					echo json_encode(["code"=>0, "message"=>$ex->getMessage()]);
				}
				break;
			
			case 'block_account':
				$uid = $_POST['user_id'];
				try{
					setStateUser($uid, 3);
					echo json_encode(["code"=>1]);
				}catch(PDOException $ex){
					echo json_encode(["code"=>0, "message"=>$ex->getMessage()]);
				}
				break;
			case 'get_comments':
				include_once $rootDir."/bookstore/model/commentDAO.php";
				try{
					$res = getCommentsUser($_POST['user_id']);
					echo json_encode(["code"=>1, "data"=>$res], JSON_UNESCAPED_UNICODE);
				}catch(PDOException $ex){
					echo json_encode(["code"=>0, "message"=>$ex->getMessage()]);
				}
				break;
		}
	}
	else header('Location: ../index.php/login?login_type=2');
	

?>