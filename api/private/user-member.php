<?php  
	session_start();
	if(isset($_SESSION['logined_member'])){
		$uid = $_SESSION['logined_member']['id'];
		$rootDir = $_SERVER['DOCUMENT_ROOT'];

		include_once $rootDir."/bookstore/model/userDAO.php";
		$type = $_POST['type'];		
		switch($type){
			case 'partial':
				$field = $_POST['field'];
				$value = $_POST['value'];
				$sql  = "update user set ".$field." = '".$value."' where id = ".$uid;
				try{
					$conn = DB::getInstance();
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					echo json_encode(["code"=>1]);
				}catch(PDOException $ex){
					echo json_encode(["code"=>0,"message"=>$ex->getMessage()]);
				}
				break;
			case 'all':
				try{
					updateInfoExcludePathImg($uid, json_decode($_POST['profile'],JSON_UNESCAPED_UNICODE));
					echo json_encode(["code"=>1]);
				}
				catch(PDOException $ex){
					echo json_encode(["code"=>0, "message"=>$ex->getMessage()]);
				}
				break;
		}
	}
	else header('Location: ../index.php/login?login_type=1');
?>