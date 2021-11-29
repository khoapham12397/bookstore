<?php

	require_once("utils.php");
	include_once("header.php");
?>

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		
		function update(x){
			ele="#quantity"+x.toString();
			c=$(ele).val();
			$.ajax({url:'../api/addCart.php',method: 'GET', dataType: 'json', data:{pid: x, count:c}}).done(function(data){
					if(data.code!=1) alert("Update error");
			})
		}

		function delProduct(x,r){
			
			$.ajax({url:'../api/addCart.php',method: 'GET',dataType:'json',data:{pid:x, count: 0}}).done(function(data){
					
					window.location="../index.php/cart";
				});
			
		}
		$(document).ready(function(){
			
		});
	</script>
</head>
<body>
	<div id="main" >
		<div id="left">
			<h2 style="margin-top: 10px">Giỏ hàng của bạn</h2>
			<table style="font-size: 18px; width: 1000px;" id="tblCart">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Count</th>
			<th>Delete</th>
		</tr>

		<?php foreach($cart as $ind=>$line){?>
			<tr id="row<?php echo $ind ?>">
				<td><img src="<?php echo $line['path_img']?>" width="80px" height="80px"/></td>
				<td><?php echo $line['name']?></td>
				<td><?php echo formatMoney($line['price'])?></td>
				<td>
					<input type="number" value="<?php echo $line['count']?>" id="quantity<?php echo $line['id']?>" style="width: 80px;" onchange="update(<?php echo $line['id']?>)"/>
				</td>
				
				<td>
					<button style="width: 100px; height:40px; background-color: #ccc;color: red; border-radius: 50px; border: none;" id="delbtn<?php echo $line['id']?>"
						onclick="delProduct(<?php echo $line['id']?>,<?php echo $ind?>)" 
					>Delete</button>
				</td>
			</tr>
		<?php }?>
	</table>
		<div>
			<h3 style="margin-right: 30px; float: right;"><a href="order.php"
				style="text-decoration: none; color: #000022;"
				>Tiến hành đặt hàng</a></h3>
		</div>
		</div>
		<?php include_once "side-bar.php"?>
	</div>
	
	<div id="footer"></div>
	
</body>
</html>
