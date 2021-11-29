<?php 
	$url = $_SERVER['PATH_INFO'];
	if($url=='') {

	}
	$arr = explode('/', $url);
	
	if($arr[1] == 'api') {
		include_once('controller/res-controller.php');
	}
	else include_once('controller/main-controller.php');

?>