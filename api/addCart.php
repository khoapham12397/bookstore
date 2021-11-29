<?php
	session_start();
	$rootDir = $_SERVER['DOCUMENT_ROOT'];

	include_once $rootDir."/bookstore/model/productDAO.php"; 

	if(isset($_GET['pid']) && isset($_GET['count'])){
		$id = $_GET['pid'];
		$count = $_GET['count'];
		$book = getProductById($id);
		
		if(!isset($_SESSION['cart'])){
		
			$cart=[["id"=>$id,"name"=>$book['name'],"price"=>$book['price'],"count"=>$count,"path_img"=>$book['path_img']]];
			$_SESSION['cart']=$cart;
		}
		else{
		
		$cart=$_SESSION['cart'];
		$flag=0;
		
		for($i=0;$i<count($cart);$i++){
			if($cart[$i]['id']==$id){
				if($count==0){
					array_splice($cart,$i,1);
				}else $cart[$i]['count']=$count;
				$flag=1;
				break;
			}
		}
		// 1 van de nao do : dung vay :	
		if($flag==0 && $count>0){
		array_push($cart,["id"=>$id,"name"=>$book['name'],"price"=>$book['price'],"count"=>$count,"path_img"=>$book['path_img']]);
		}
		$_SESSION['cart']=$cart;

		}
		echo json_encode(["code"=>1]);
	}
	else echo json_encode(["code"=>0]);
?>