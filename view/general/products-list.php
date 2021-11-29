<?php 
	include_once("header.php");
	include_once($_SERVER['DOCUMENT_ROOT'].'/bookstore/utils.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

	<script type="text/javascript">
		function buyProduct(pid){
			$.ajax({url : '../api/addCart.php', method: 'GET', dataType : 'json',data: {pid: pid, count: 1}}).done(function(res){
				if(res.code == 1){
					if(confirm("Do you want to view cart ?"))
						window.location = "../index.php/cart";
				}
			});
		}
	</script>
</head>
<style type="text/css">

.my-search {
   	width: 50%;
   	margin: 50px atuo;
}

.has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}
</style>
<body style="font-size:17px;">
	
	<?php include "icon-list.php"?>
	<div style="margin-top: 180px;">
	<div class="main-search">
	   <div class="input-group" >
    	<form action ="../index.php/products" class="input-group">
    	<input type="text" class="form-control" placeholder="Search products" name="q">
    	<div class="input-group-append">
    		
      			<button class="btn btn-secondary" type="submit" >
        			<i class="fa fa-search"></i>
      			</button>
      		
    	</div>
    	</form>
  		</div>
 	</div>
	</div>	
	<h2 style="margin-top: -30px; margin-bottom: -30px">Top Products</h2>

	<div id="main">
		
		<div id="left" style="margin-top: 45px;">
			<ul>
				<?php for($i=0;$i<count($books);$i++){?>
					<li class="book-item">
						<a href="../index.php/product?pid=<?php echo $books[$i]['id']?>">
						<div id="contain-book">
							<img src="<?php echo $books[$i]['path_img']?>"/>
							<h3 style="font-size: 20px; padding-top: 12px;"><b><?php echo reduceName($books[$i]['name'])?></b></h3>
							<div style="color: red"><?php echo formatMoney($books[$i]['price'])?> đ</div>
						</div>
						</a>
						<div><button style="width: 130px; height:40px; margin-left: 25px;background-color: 	#000022; color: white; border-radius: 50px;
						margin-top: 5px; margin-bottom: 3px; border: none;
					" onclick="buyProduct(<?php echo $books[$i]['id']?>)">Buy now</button></div>
					</li>
				<?php }?>
			</ul>

			<nav aria-label="Page navigation example" style="clear: left;">
				<?php
				echo $Paginator->createLinks(1,"pagination");
			?>
			</nav>
			<br>
			</div>
	<?php include_once('side-bar.php')?>

	</div>
</body>
</html>