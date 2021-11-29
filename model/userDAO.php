<?php 
	
	include_once "connectionDB.php";

	function checkMemberEmailPass($email , $password){
		$conn = DB::getInstance();
		$stmt = $conn->prepare('select * from user where email = ? and password = ?');
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->bindParam(1,$email); $stmt->bindParam(2,$password);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function checkAdminPass($email,$password){
		$conn = DB::getInstance();
		$stmt = $conn->prepare('select * from admin where email = ? and password = ?');
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->bindParam(1,$email); $stmt->bindParam(2,$password);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function getProfile($uid){
		$conn =DB::getInstance();
		$stmt= $conn->prepare('select * from user where id=?');
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->bindParam(1,$uid);
		$stmt->execute();
		return $stmt->fetch();
	}	

	// username,email, phone, address 
	function updateInfoExcludePathImg($uid ,$profile){
		$conn = DB::getInstance();
		$stmt = $conn->prepare('update user set username = ?, email=?,phone=?,address=? where id= ?' );
		$stmt->bindParam(1,$profile['username']);
		$stmt->bindParam(2,$profile['email']);
		$stmt->bindParam(3,$profile['phone']);
		$stmt->bindParam(4,$profile['address']);
		$stmt->bindParam(5,$uid);
		$stmt->execute();
	}

	function setStateUser($uid, $state){
		$conn = DB::getInstance();
		$stmt= $conn->prepare('update user set state = ? where id = ?');
		$stmt->bindParam(1,$state);
		$stmt->bindParam(2,$uid);
		$stmt->execute();
	}	

	function insertUser($info){
		$conn = DB::getInstance();
		$stmt = $conn -> prepare('insert into user(username,email,address,phone,password,state) values(?,?,?,?,?,?)');
		$stmt->bindParam(1,$info['username']);
		$stmt->bindParam(2,$info['email']);
		$stmt->bindParam(3,$info['address']);
		$stmt->bindParam(4,$info['phone']);
		$stmt->bindParam(5,md5($info['password']));
		$state = 1;
		$stmt->bindParam(6,$state);
		$stmt->execute();
	}

	function getStateOfUser($user_id){
		$conn = DB::getInstance();
		$stmt = $conn->prepare('select state from user where id = ?');
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->bindParam(1,$user_id);
		$stmt->execute();
		return $stmt->fetch();
	}
?>