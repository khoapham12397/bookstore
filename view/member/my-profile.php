<?php 
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/member-style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){

        $("#btnSubmit").click(function(){
          
            let prof = {username : $("#inpName").val(), phone : $("#inpPhone").val(), email : $("#inpEmail").val(), address : $("#inpAddress").val() };
            let sendData = {type : "all", profile : JSON.stringify(prof)};

            $.ajax({url : "../api/private/user-member.php" , method : "POST", dataType: "json", data: sendData}).done(function(data){
                    if(data.code == 1) alert("Update successful");
                    else alert(data.message);
            });
        });

    	$("#but_upload").click(function(){
    		
        var fd = new FormData();
        var files = $('#file')[0].files;
        if(files.length > 0 ){
           fd.append('file',files[0]);

           $.ajax({
              	url: '../upload.php',
              	type: 'post',
              	data: fd,
              	contentType: false,
              	processData: false,
              	success: function(response){
                 	if(response != 0){
                 	//	alert(response); 
                        
                        let sendData = {type: "partial" , field : "path_img" , value : response};

                        $.ajax({url: "../api/private/user-member.php", method : "POST", dataType: "json", data : sendData  }).done(function(data){
                                if(data.code==0) alert(data.message);
                        }) ;                                              
                 		
                        $("#my-avatar").attr("src",response);
                 	}else{
                    	alert('file not uploaded');
                 	}
              },
           });
        }else{
           alert("Please select a file.");
        }
        
    });
});
	</script>
</head>
<style type="text/css">

.my-container{
   margin: 0 auto;
   border: 0px solid black;
   width: 50%;
   height: 250px;
   border-radius: 3px;
   text-align: center;
}
/* Preview */
.preview{
   width: 100px;
   height: 100px;
   border: 1px solid black;
   margin: 0 auto;
   background: white;
}

.preview img{
   display: none;
}
/* Button */
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
.wrapper {
    display: flex;
    width: 100%;
}

#sidebar {
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    z-index: 999;
    background: #7386D5;
    color: #fff;
    transition: all 0.3s;
}
p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

#sidebar {
    /* don't forget to add all the previously mentioned styles here too */
    background: #7386D5;
    color: #fff;
    transition: all 0.3s;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #6d7fcc;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}
#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
}
ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}
</style>
<body>
    <div class="wrapper">
         <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Profile</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Dummy Heading</p>
            <li class="active">
                <a href="../index.php/" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </nav>
    <div id="content" style="margin-left: 200px;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       
    </nav>
    <div class="container" style="margin-left: 100px;">
    
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-2">
                <img class="my-avatar" src="<?php echo $user['path_img']?>" id="my-avatar"><span class="font-weight-bold"><?php echo $user['username']?></span><span class="text-black-50"><?php echo $user['email']?></span><span> </span></div>
            
            <div class="py-4">
                <form  method="post" action="" enctype="multipart/form-data" id="myform">
                    
                <input type="file" id="file" name="file"  />
                                    
                <div class="row" style="margin-top: 10px; margin-left:2px">
                    <input  type="button" class="btn btn-primary" value="Upload" id="but_upload"/>
                </div>
            </form>
            </div>
             
        </div>
        
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="<?php echo $user['username']?>"  id = "inpName" /></div>
                    <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="surname"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">PhoneNumber</label><input type="text" class="form-control" placeholder="enter phone number" value="<?php echo $user['phone']?>" id="inpPhone" /></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address" value="<?php echo $user['address']?>" id ="inpAddress"/></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="<?php echo $user['email']?>" id ="inpEmail"/></div>
                    <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value="Student"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="Việt Nam"></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="TP HCM"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button" id ="btnSubmit">Save Profile</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>

            
        </div>
    </div>
</div> 
</div>
       
    </div>
	

</body>
</html>