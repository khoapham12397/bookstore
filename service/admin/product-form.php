<?php 
	session_start();
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
	include_once $rootDir."/bookstore/model/productDAO.php";
	$categories = getCategories();
	$book = NULL;
	$pid = 0;
	if($url == '/edit-product'){
		if(isset($_GET['pid'])){
			$pid = $_GET['pid'];
			$book = getProductById($pid);
		}
	}
	include_once $rootDir."/bookstore/view/admin/productForm.php";
		
?>