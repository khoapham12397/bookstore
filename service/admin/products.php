<?php 
	session_start();
	$rootDir = $_SERVER['DOCUMENT_ROOT'];

	include_once $rootDir."/bookstore/model/connectionDB.php";
	
	require_once "paginator.php";
	
	$limit = 25; $page =1;

	if(isset($_GET["limit"]) && isset($_GET["page"])) {
		$limit = $_GET["limit"]; $page = $_GET['page'];
	}

	$option = "none";

	if(isset($_GET["option"])) $option = $_GET["option"];
	
 	$conn = DB::getInstance();

	switch($option){
		case "none":
			$query = "select * from tb_book";
			$query_count = "select count(*) as count from tb_book";
			$Paginator = new Paginator($conn,$query,$query_count);
			$result = $Paginator -> getData($limit,$page);
			break;	
		case "key":
			$key = $_GET['q'];
			$query = "select * from tb_book where match(name,author_name,short_description) against('".$key."')";
			$query_count = "select count(*) as count from tb_book where match(name,author_name,short_description) against('".$key."')";
			$Paginator = new Paginator($conn,$query,$query_count);
			$result = $Paginator->getData($limit,$page);
			break;

		case "category":
			$category_id = $_GET['category_id'];
			$query = "select * from tb_book where category_id = ".$category_id ;
			$query_count = "select count(*) as count from tb_book where category_id = ".$category_id;
			$Paginator = new Paginator($conn,$query,$query_count);
			$result = $Paginator->getData($limit,$page);
			break;
	}


	include_once $rootDir."/bookstore/view/admin/product-list.php";
	
?>
