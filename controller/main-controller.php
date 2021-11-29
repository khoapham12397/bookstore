<?php 
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
	switch ($url) {
		
		case '/products':
			include_once $rootDir."/bookstore/service/products.php";
			break;
		
		case '/product':
			if(!isset($_GET['pid']))
				header('Location: '.$rootDir.'/bookstore/index.php');
			else {
				$pid = $_GET['pid'];
				include_once $rootDir."/bookstore/service/product.php";
			}
			break;
		
		case '/cart':
			include_once $rootDir."/bookstore/service/cart.php";
			break;

		case '/login':
			include_once $rootDir."/bookstore/service/login.php";
			break;

		case '/profile':
			include_once $rootDir."/bookstore/service/member/profile.php";
			break;

		default:
			include_once $rootDir."/bookstore/service/products.php";
			break;
	}
	
?>