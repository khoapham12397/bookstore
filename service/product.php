<?php 
	session_start();
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
	include_once $rootDir."/bookstore/model/productDAO.php";
	include_once $rootDir."/bookstore/model/commentDAO.php";

	$book = getProductById($pid);
	
	$books = get4Products();	
	$comments = get_comments_product_limit(time(),6,$pid);

	$categories = getCategories();
	//echo json_encode($comments);
	if(isset($_COOKIE['products_viewed'])){
		$pv=json_decode($_COOKIE['products_viewed']);
		$len=count($pv);

		for($i=0;$i<$len;$i++){
			if($pv[$i]==strval($pid)){
				array_splice($pv,$i,1);
				break;
			}
		}
		array_unshift($pv, $pid);
		setcookie("products_viewed",json_encode($pv),time()+24*60*60,"/");
	}else{
		$pv=[$pid];
		setcookie("products_viewed",json_encode($pv),time()+24*60*60,"/");
	}
		

	include_once $rootDir."/bookstore/view/general/product-detail.php";
?>	