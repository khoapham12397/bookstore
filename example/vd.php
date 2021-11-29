<?php  
	session_start();

?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#btnSend").click(function(){
				let book = {name : "chuyển khảo", price : 120000};

				$.ajax({url : "vd1.php", method: "POST", dataType: "json",data :{book : JSON.stringify(book)}}).done(function(data){
					alert(JSON.stringify(data));
				});
				
			});
		});

	</script>
</head>
<body>
	
	<script type="text/javascript">
		var decodeCookie = decodeURIComponent(document.cookie);
		//	alert(decodeCookie);

	</script>
	<div>
		<form action="../api/comment.php" method= "POST">
		<input type="text" placeholder="product_id" name="product_id" />
		<input type="text" placeholder="user_id" name="user_id" />
		<input type="text" placeholder="content" name="content" />
		<input type="text" name="username">
		<input type="submit"  value="ok"/>
		</form>
	</div>
	<div>
		<button id="btnGetCmt">
			GetComment
		</button>
		<button id="btnSend">Send</button>
	</div>
</body>
</html>