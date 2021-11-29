<?php 

	include $_SERVER['DOCUMENT_ROOT'].'/bookstore/model/connectionDB.php';
	
	function generalProducts(){
		$conn = DB::getInstance();
		$stmt = $conn->prepare('select * from tb_book');
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		$res = $stmt->fetchAll();	
		return $res;
	}

	function getProductsByKey($keyword){
		$conn = DB::getInstance();
		$stmt = $conn->prepare('select * from tb_book where match(name,author_name,short_description) against(?)');
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->bindParam(1,$keyword);
		$stmt->execute();
	 	return $stmt->fetchAll();
	}
	function getProductById($pid){
		$conn = DB::getInstance();
		$stmt= $conn->prepare('select * from tb_book where id = ?');
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->bindParam(1,$pid);
		$stmt->execute();
		return $stmt->fetch();
	}
	function get4Products(){
		$conn = DB::getInstance();
		$stmt= $conn->prepare('select * from tb_book order by rand() limit 5');
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		return $stmt->fetchAll();
	}	

	function getProductsByCate(){
		return NULL;
	}
	
	function getCategories(){
		$conn = DB::getInstance();
		$stmt= $conn->prepare('select * from book_category');
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function insertProduct($book){

		$conn = DB::getInstance();
		$stmt= $conn->prepare('insert into tb_book(name,path_img,price,short_description,author_name,category_id,publisher,quantity,pages_number) values (?,?,?,?,?,?,?,?,?)');

		$stmt->bindParam(1,$book['name']);
		$stmt->bindParam(2,$book['path_img']);
		$stmt->bindParam(3,$book['price']);
		$stmt->bindParam(4,$book['short_description']);
		$stmt->bindParam(5,$book['author_name']);
		$stmt->bindParam(6,$book['category_id']);
		$stmt->bindParam(7,$book['publisher']);
		$stmt->bindParam(8,$book['quantity']);
		$stmt->bindParam(9,$book['pages_number']);
		$stmt->execute();
	}

	// name, path_img, price
	function updateProduct($book){
		$conn = DB::getInstance();
		$stmt = $conn->prepare('update tb_book set name = ?,path_img=?, price =?, short_description=?,author_name=?,category_id=?,publisher=?,quantity=?,pages_number=? where id =?');
		$stmt->bindParam(1,$book['name']);
		$stmt->bindParam(2,$book['path_img']);
		$stmt->bindParam(3,$book['price']);
		$stmt->bindParam(4,$book['short_description']);
		$stmt->bindParam(5,$book['author_name']);
		$stmt->bindParam(6,$book['category_id']);
		$stmt->bindParam(7,$book['publisher']);
		$stmt->bindParam(8,$book['quantity']);
		$stmt->bindParam(9,$book['pages_number']);
		$stmt->bindParam(10,$book['id']);
		$stmt->execute();
	}
?>