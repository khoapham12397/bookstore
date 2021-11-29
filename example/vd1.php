<?php 
	session_start();
	$book = json_decode($_POST['book'],JSON_UNESCAPED_UNICODE);
	$nbook = ["name"=> $book['name'], "price"=>$book['price']];
	echo json_encode($nbook, JSON_UNESCAPED_UNICODE);
?>