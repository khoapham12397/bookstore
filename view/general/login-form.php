<?php 
	include_once "header.php";
	include_once "utils.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
	<script type="text/javascript">
		$(document).ready(function(){
			var loginType = <?php echo $login_type?>;
			//alert(loginType);
		});
	</script>
</head>
<body>
	<div id="main">
		<div id="left">
			<form action="../index.php/login" method="post" style="margin-top: 55px;">
  				<div class="imgcontainer">
    				<img src="../images/avatar-default.png" alt="Avatar" class="avatar">
  				</div>

  			<div class="container">
    			<label for="email"><b>Email</b></label>
   			 	<input type="text" placeholder="Enter Email" name="email" class="input-login"
   			 	value = "<?php echo $email_cookie?>"
   			 	required>

    			<label for="psw"><b>Password</b></label>
    			<input type="password" placeholder="Enter Password" name="password" class="input-login"
    			value="<?php echo $password_cookie?>"
    			required>
        		
        		<input type="hidden" name="login_type" value="<?php echo $login_type?>"/>
    			<button type="submit" class= "btn btn-primary">Login</button>

    			<label>
      			<input type="checkbox" checked="checked" name="remember"> Remember me
						    			
    			</label>
 	 		</div>

  			<div class="container" style="background-color:#f1f1f1">
    			<button type="button"  class="cancelbtn">Cancel</button>
    			<span class="psw">Forgot <a href="#">password?</a></span>
  			</div>
			</form>
			
			
		</div>
		<?php include_once("side-bar.php")?>		
	</div>
</body>
</html>