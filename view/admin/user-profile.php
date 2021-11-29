<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/admin-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<style type="text/css">
.my-btn{
   border: 0px;
   background-color: deepskyblue;
   color: white;
   padding: 5px 15px;
   margin-left: 10px;
}
.my-avatar{
	width:  220px;
	height: 220px;
	border-radius: 50%;
}
</style>
<?php include_once "comments.php"?>

<script type="text/javascript">
	$(document).ready(function(){
		
		$("#btnBlockCmt").click(function(){
			let uid = <?php echo $user['id']?>;
			$.ajax({url : "../api/private/user-admin.php", method:"POST", dataType: "json", data: {action : "block_comment", user_id : uid}}).done(function(data){
				if(data.code == 1) alert("Block Comment Successful");
				else alert(data.message);
			});
		});

		$("#btnBlockAcc").click(function(){
			let uid = <?php echo $user['id']?>;
			$.ajax({url : "../api/private/user-admin.php", method:"POST", dataType: "json", data: {action : "block_account", user_id : uid}}).done(function(data){
				if(data.code == 1) alert("Block Account Successful");
				else alert(data.message);
			});
		});
		$("#btnViewCmt").click(function(){
			let uid = <?php echo $user['id']?>;
			let tblComments = $("#tbl-comments");
			$.ajax({url : "../api/private/user-admin.php",method : "POST", dataType: "json", data:{action: "get_comments", user_id : uid}}).done(function(data){
				if(data.code ==1){
					alert("get data");
					showComments(data,tblComments);
				}
				else alert(data.message);
		});
		});
	});	
</script>
<body>
	<div id="viewport" >
		<?php include "control-bar.php";?>
		<nav class="navbar navbar-default">
      	<div class="container-fluid">
      		
       	</div>
    	</nav>
		<div class="container rounded bg-white mt-5 mb-5">

		<div class="row">
			<div class="col-md-5" style="margin-left: -30px; border-right: 1px solid #ccc; padding-right: 40px;">
        	
        	<div class="d-flex flex-column align-items-center text-center p-3 py-2">
            	<img class="my-avatar" src="<?php echo $user['path_img']?>" id="my-avatar">
            </div>
            <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3">
	    		<form  method="post" action="" enctype="multipart/form-data" id="myform">
            		
				<input type="file" id="file" name="file"  />
				    				
    	    	<div class="row" style="margin-top: 10px; margin-left:2px">
            		<input  type="button" class="btn btn-primary" value="Upload" id="but_upload"/>
        		</div>
    		</form>
   	 		</div>
   	 		</div>
            <div class="p-3 py-5" >
                <div class="d-flex justify-content-between align-items-center mb-3">
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="<?php echo $user['username']?>"  id = "inpName" /></div>
                    <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="surname"></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">PhoneNumber</label><input type="text" class="form-control" placeholder="enter phone number" value="<?php echo $user['phone']?>" id="inpPhone" /></div>
                </div>
                <div class="row mt-3">
                	<div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address" value="<?php echo $user['address']?>" id ="inpAddress"/></div>
                </div>
                <div class="row mt-3">
                	<div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="<?php echo $user['email']?>" id ="inpEmail"/></div>
                </div>
                <div class="row mt-3">
                	<div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value="Student"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="Việt Nam"></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="TP HCM"></div>
                </div>
                <br>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button" id ="btnSubmit">Save Profile</button></div>
            </div>
        </div>
        <div class="col-md-7" style=" padding: 20px;">
    	<ul class="nav navbar-nav navbar-right">
          	<li>
            <a href="#"><i class="zmdi zmdi-notifications text-danger">
            	<button id = "btnBlockCmt" class="">Block Comments</button>
            </i>
			</a>
          </li>
          <li><a href="#"><button id="btnBlockAcc" class="">Block Account</button></a></li>
        </ul>    	
        <br><br>
        	<h2 style="padding-left: 40px;"><b>All Comments</b></h2>
    		<br>
        	<table class="table" style="width: 100%; margin-left: 5%" id="tbl-comments">
      			<thead>
        		<tr>
            	
            		<th>Product</th>
            		<th>Content</th>
            		<th>State</th>
            	</tr>
        		<?php foreach($comments as $cmt){?>
        			<tr>
        				<td><?php echo $cmt['product_id']?></td>
        				<td><?php echo $cmt['content']?></td>
        				<td><?php echo $cmt['comment_state']?></td>
        			</tr>
        		<?php }?>
      			</thead>
       		</table>
        
		</div>
      	
        
        
    </div>
	</div>
</div>
</body>
</html>