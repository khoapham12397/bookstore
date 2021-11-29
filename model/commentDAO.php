<?php 
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
	include_once $rootDir."/bookstore/model/connectionDB.php";

	function get_comments_product_limit($time, $count, $pid){
		$conn = DB::getInstance();
		$stmt = $conn -> prepare('select * from comment where id < ? and product_id = ? and comment_state = 1 limit 5');
		$stmt -> setFetchMode(PDO::FETCH_ASSOC);
		$stmt->bindParam(1,$time);
		$stmt->bindParam(2,$pid);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	function get_allComments_product($pid){
		$conn = DB::getInstance();
		$stmt = $conn -> prepare('select * from comment where product_id = ?');
		$stmt -> setFetchMode(PDO::FETCH_ASSOC);
		
		$stmt->bindParam(1,$pid);

		$stmt->execute();
		return $stmt->fetchAll();
	}

	function get_wait_comments(){
		$conn = DB::getInstance();
		$stmt = $conn -> prepare('select * from comment where comment_state=0');
		$stmt -> setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function insertComment($user_id, $product_id, $content,$parent_comment_id,$username){
		$conn = DB::getInstance();
		$id = time(); $state = 0;
		
		$stmt = $conn->prepare('insert into comment(id,product_id,user_id,content,parent_comment_id,comment_state,username) values(?,?,?,?,?,?,?)');
		$stmt->bindParam(1,$id);
		$stmt->bindParam(2,$product_id);
		$stmt->bindParam(3,$user_id);
		$stmt->bindParam(4,$content);
		$stmt->bindParam(5,$parent_comment_id);
		$stmt->bindParam(6,$state);
		$stmt->bindParam(7,$username);
		$stmt->execute();
	}
		
	function changeState($comment_id, $state){
		$conn = DB::getInstance();
		$stmt = $conn->prepare('update comment set comment_state = ? where id =?');
		$stmt->bindParam(1,$state);
		$stmt->bindParam(2,$comment_id);
		$stmt->execute();
	}

	function getCommentsUser($user_id){
		$conn = DB::getInstance();
		
		$stmt = $conn->prepare('select * from comment where user_id = ?');
		
		$stmt->bindParam(1,$user_id);
		$stmt->execute();
		
		return $stmt->fetchAll();
	}
	
?>
