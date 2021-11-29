<?php  
	session_start();
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
	// thu ok chua ?
	include_once $rootDir."/bookstore/model/userDAO.php";
	include_once $rootDir."/bookstore/model/commentDAO.php";
	if(!isset($_GET['uid'])) header('Location: ../admin.php/');
	else{
		$user_id = $_GET['uid'];
		$user = getProfile($user_id);
		$comments = getCommentsUser($user_id);

		include_once $rootDir."/bookstore/view/admin/user-profile.php";
	}
?>