<?php  
	session_start();
		
	$rootDir = $_SERVER['DOCUMENT_ROOT'];

	if(isset($_SESSION['logined_member'])){
		include_once $rootDir."/bookstore/model/userDAO.php";

		$user= getProfile($_SESSION['logined_member']['id']);
		
		include_once $rootDir."/bookstore/view/member/my-profile.php";
	}
	else header('Location: ../index.php/login?login_type=1');
		
?>