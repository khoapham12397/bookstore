<?php 
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
	session_start();

	switch ($url) {
		case '/api/addCart':
			include_once('../api/addCart.php');
			break;
		case '/api/login':

			break;
		case "/api/setStateComment":

			break;
		default:
			// code...
			break;
	}
?>