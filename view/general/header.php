<?php 
	$logined=0;
	if(isset($_SESSION['logined_member'])) $logined=1;
	else if(isset($_SESSION['logined_admin'])) $logined = 2;
?>
<!DOCTYPE html>
<html>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="../css/style.css">
<style type="text/css">
	/* Styles for wrapping the search box */

.main-search {
    width: 50%;
    margin: 50px auto;
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
<script type="text/javascript">

	$(document).ready(function(){
		
		$("#btnRegister").click(function(){
			$("#myModal").modal();
		});

		$("#btnSubReg").click(function(){
			let info = {username : $("#username").val(), email : $("#email").val(), phone :$("#phone").val(), address : $("#address").val(), password: $("#password").val()};

			$.ajax({url : "../api/user.php",method:"POST", dataType: "json", data:{action: "register", info : JSON.stringify(info) }}).done(function(data){
					if(data.code == 1) 
						alert("Register Successful");
					else alert(data.message);
			});
		});
	});
</script>
<body >
	<div id="banner-top">
		<img src="https://media.digistormhosting.com.au/kcs/_pageBannerImage/book-banner-new.jpg?mtime=20190214135259" width="1000px" height="180px" style="object-fit: cover;" />
		<img src="https://pbs.twimg.com/profile_images/812451226633863168/oA1O8ZBn_400x400.jpg"
		style="width: 180px; height: 180px; margin-left: 60px"/>
	</div>
	<div id="menu-top">
		<ul>
			<li class="main-title"><a href="../index.php/products">Trang chủ</a></li>
			<li class="main-title"><a href="#" >Giới thiệu</a></li>
			<li class="main-title">
				<div class="drop-out">
				<a href="documents.php">
					<div>Tài liệu</div>
					<div class="drop-out-content" style="width: 500px;">
							<ul>
								<li class="sub-title"><a href="#">Toán học</a></li>
								<li class="sub-title"><a href="#">Lập trình</a></li>
								<li class="sub-title"><a href="algorithms.php">Thuật toán</a></li>
								<li class="sub-title"><a href="#">Machine Learning</a></li>
							</ul>
						
					</div>
				</a>
				</div>
			</li>
			<li class="main-title"><a href="#">Liên hệ</a></li>
			<li class="main-title"><a href="#">Forum</a></li>
			<li class="main-title">
				<div class="drop-out">
					<a href="../index.php/profile">
						<div>Cá nhân</div>
						<div class="drop-out-content"  style="width: 410px;">
							<ul>
								<li class="sub-title"><a href="#">Thông tin cá nhân</a></li>
								<li class="sub-title"><a href="#">Quản lý đơn hàng</a></li>	
								<li class="sub-title"><a href="#">Mã giảm giá</a></li>
								<li class="sub-title"><a href="personal.php">Sản phẩm đã xem</a></li>
							</ul>
						</div>
					</a>
				</div>	
			</li>
			<li class="main-title"><a href="../admin.php/">Admin</a></li>
		</ul>

		<?php if($logined==0){?>
			<div  style="float: right; margin-top: 8px;padding-bottom: 3px; margin-right: 30px;">
				<span class="drop-out" >
					<a class="log" style="padding-left: 20px; cursor: pointer; ">Login</a>
					<div class="drop-out-content" style="margin-top: 5px;">
						<ul>
							<li class="sub-title"><a href="../index.php/login?login_type=1">Member</a></li>
							<li class="sub-title"><a href="../index.php/login?login_type=2">Admin</a></li>
						</ul>
						
					</div>
				</span>

				<span style="color:white;"> | </span>
				<span><button id ="btnRegister" class="btn btn-primary" style=" margin-top: -10px; ">Register</button>
					<div class="modal fade" id="myModal">
    				<div class="modal-dialog">
      				<div class="modal-content">
      
        <!-- Modal Header -->
       				<div class="modal-header">
          			<h4 class="modal-title">Register Form</h4>
          			<button type="button" class="close" data-dismiss="modal">×</button>
        			</div>
        
        <!-- Modal body -->
        			<div class="modal-body">
          				<section>
    <div class="container">
      
      <div class="alert alert-warning text-center my-4">
        
      </div>
      
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-12">
          <div class="row">
            <div class="col text-center">
              <h1>Register</h1>
            </div>
          </div>
          <div class="row align-items-center">
            <div class="col mt-5">
              <input type="text" class="form-control" placeholder="Username" id="username">
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col">
              <input type="email" class="form-control" placeholder="Email" id = "email">
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col">
              <input type="text" class="form-control" placeholder="Phone number" id="phone">
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col">
              <input type="text" class="form-control" placeholder="Address" id="address">
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col">
              <input type="password" class="form-control" placeholder="Password" id="password">
            </div>
            <div class="col">
              <input type="password" class="form-control" placeholder="Confirm Password" id="cpassword">
            </div>
          </div>
          <div class="row justify-content-start mt-4">
            <div class="col">
             	<button class="btn btn-primary mt-4" id ="btnSubReg">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
        			</div>
        
        <!-- Modal footer -->
        			<div class="modal-footer">
          			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        			</div>
        
      				</div>
    				</div>
  					</div>

				</span>
				<a href="../index.php/cart"><i class="fa fa-shopping-cart" style="margin-top: -15px; margin-left:10px ;font-size:30px;color:red"></i></a>	
			</div>
			
		<?php }else if($logined==1){ ?>
			<div  style="float: right; margin-top: 10px; margin-right: 30px; color: white;">
				<span> <?php echo $_SESSION['logined_member']['username']?> | </span><span><a class="log">Logout</a></span>
				<a href="../index.php/cart"><i class="fa fa-shopping-cart" style="margin-top: -15px; margin-left:10px ;font-size:30px;color:red"></i></a>	
			</div>
		<?php }?>
		
	</div>
	
</body>
</html>
	