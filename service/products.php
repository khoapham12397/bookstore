<?php 
	
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
	session_start();
	include_once $rootDir."/bookstore/model/productDAO.php";
	include_once "paginator-gen.php";

	$limit = 25; $page = 1;	

	if(isset($_GET["limit"]) && isset($_GET["page"])) {
		$limit = $_GET["limit"]; $page = $_GET['page'];
	}
	 $conn = DB::getInstance();

	if(isset($_GET['q'])){
		$key = $_GET['q'];
		$query = "select * from tb_book where match(name,author_name,short_description) against('".$key."')";
		$query_count = "select count(*) as count from tb_book where match(name,author_name,short_description) against('".$key."')";
		$Paginator = new Paginator($conn,$query,$query_count);
		$result = $Paginator->getData($limit,$page);
		$books = $result->data; // cai nay dung 
		//$books = getProductsByKey($_GET['q']);
	}

	else if(isset($_GET['category'])){
		$category_id = $_GET['category'];
		$query = "select * from tb_book where category_id = ".$category_id ;
		$query_count = "select count(*) as count from tb_book where category_id = ".$category_id;
		$Paginator = new Paginator($conn,$query,$query_count);
		$result = $Paginator->getData($limit,$page);
		$books = $result->data;
	}
	else {
		$query = "select * from tb_book";
		$query_count = "select count(*) as count from tb_book";
		$Paginator = new Paginator($conn,$query,$query_count);
		$result = $Paginator -> getData($limit,$page);
		$books = $result->data;
	}

	include_once $rootDir."/bookstore/view/general/products-list.php";
	
?>
