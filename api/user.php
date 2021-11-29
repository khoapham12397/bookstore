<?php 
	session_start();
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
	include_once $rootDir."/bookstore/model/userDAO.php";
	$action = $_POST['action'];	

	switch($action){
		case "register":
			try{
				insertUser(json_decode($_POST['info'],JSON_UNESCAPED_UNICODE));
				echo json_encode(["code"=>1]);
			}
			catch(PDOException $ex){
				echo json_encode(["code"=>0, "message"=>$ex->getMessage()]);
			}
			break;
	}
?>