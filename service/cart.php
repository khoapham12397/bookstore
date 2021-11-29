<?php 
	session_start();
	
	if(isset($_SESSION['cart'])) $cart=$_SESSION['cart'];
	else $cart=[];
	
	if(!isset($_SESSION['logined_member'])) $logined=0;
	else $logined=1;

	$rootDir = $_SERVER['DOCUMENT_ROOT'];
	include_once $rootDir."/bookstore/view/general/cart.php";
?>
