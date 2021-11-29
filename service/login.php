<?php
	session_start();
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
	include_once $rootDir."/bookstore/model/userDAO.php";
	$invalid  = 0;	
	
	$login_array= ['logined_member','logined_admin'];

	if(isset($_POST['login_type']) && isset($_POST['email']) && isset($_POST['password'])) {

		$login_type = $_POST['login_type'];

		if($login_type == 1){
			$accountArr = checkMemberEmailPass($_POST['email'],md5($_POST['password']));
			if(count($accountArr) > 0){

				$logined_info = ["email"=> $_POST['email'],"password"=> $_POST['password'],"username"=> $accountArr[0]["username"],"id"=> $accountArr[0]["id"]];

				$_SESSION['logined_member'] = $logined_info;

				if(isset($_POST['remember']))
					setcookie("logined_member", json_encode($logined_info), time() + 24*60*60,"/");
				header('Location: ../index.php/');
			}
			else {
				$invalid = 1;
				include_once $rootDir."/bookstore/view/general/login-form.php";
			}
		}
		else if($login_type == 2){
		 	$accountArr = checkAdminPass($_POST['email'],md5($_POST['password']));
		 	if(count($accountArr)>0) {

				$logined_info = ["email"=> $_POST['email'],"password"=> $_POST['password'], "admin_name"=> $accountArr[0]["admin_name"],"id"=>$accountArr[0]["id"]];
				
				$_SESSION['logined_admin'] = $logined_info;

				if(isset($_POST['remember']))
					setcookie("logined_admin", json_encode($logined_info),time() + 24*60*60,"/");
				header("location: ../admin.php/");
			}
			else {
				$invalid = 1;
				include_once $rootDir."/bookstore/view/general/login-form.php";
			}
		}
	}
	else if(isset($_GET['login_type'])){
		$login_type = $_GET['login_type'];

		$email_cookie = ""; $password_cookie="";

		if(isset($_COOKIE[$login_array[$login_type]])) {
			$info = json_decode($_COOKIE[$login_array[$login_type]],true);
			$email_cookie = $info['email'];
			$password_cookie = $info['password'];
		}		
		include_once $rootDir."/bookstore/view/general/login-form.php";
	}
	
?>