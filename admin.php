<?php 
	session_start();

	if(!isset($_SESSION['logined_admin'])){
		header("Location: ../index.php/login?login_type=2");	
	}
	else{
		$rootDir = $_SERVER['DOCUMENT_ROOT'];
		$url = $_SERVER['PATH_INFO'];
		
		switch($url){
			case "/new-product":
				include_once $rootDir."/bookstore/service/admin/product-form.php";
				break;
			case "/edit-product":
				include_once $rootDir."/bookstore/service/admin/product-form.php";
				break;
			case "/products":
				include_once $rootDir."/bookstore/service/admin/products.php";
				break;
			case "/user-profile":
				include_once $rootDir."/bookstore/service/admin/user-profile.php";
				break;
			default:
				include_once $rootDir."/bookstore/view/admin/control.php";
				break;
		}
		
	}
?>