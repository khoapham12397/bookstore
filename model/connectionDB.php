<?php 

	class DB{
		private static $instance = NULL;
		
		public static function getInstance(){
		
			if(!isset(self::$instance)){
			try{
			self::$instance = new PDO('mysql:host=localhost;dbname=book_store;charset=utf8','root','');
			self::$instance -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			}
			catch(PDOException $ex){
				die($ex->getMessage());
			}
			}
		
		return self::$instance;
		}
	}

?>