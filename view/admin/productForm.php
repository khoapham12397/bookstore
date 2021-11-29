<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/admin-style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
  <script type="text/javascript">
        
      $(document).ready(function(){
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
                      $("#path_img").val(response);
                      $("#productImage").attr("src",response);
                  }else{
                      alert('file not uploaded');
                  }
              },
           });
        }else{
           alert("Please select a file.");
        }
        
        });
          $("#btnSub").click(function(){
          // id
          //name, price ,path_img, short_description,author_name,category_id,publiser,pages_number,quantity
            let update = <?php echo ($book==NULL)?0:1 ;?>;
            
            let book = {
              name : $("#name").val(), 
              price : $("#price").val(), 
              path_img: $("#path_img").val(), 
              short_description : $("#short_description").val(), 
              author_name: $("#author_name").val(), 
              category_id : $("#category_id").val(),
              publisher : $("#publisher").val(),
              pages_number : $("#pages_number").val(),
              quantity : $("#quantity").val()
            };
            if(update==1) book.id = <?php echo $pid;?>;
            let sendData = JSON.stringify(book);
            //let act = update?"update":"add";
            let send = {};
            if(update) send = {action :"update", type: "all", book : sendData};
            else send  = {action : "add", book : sendData};
            
            $.ajax({url : "../api/product.php", method: "POST",dataType: "json", data : send }).done(function(data){
                if(data.code == 1) alert("successful");
                else alert(data.message);
            }) 
          });
       
      });    
  </script>
</head>
<style>
.prod-img{
    width: 150px;
    height: 150px;
}
</style>
<body>
   <div id="viewport" >
	<?php include_once "control-bar.php"?>
	<nav class="navbar navbar-default">
      <div class="container-fluid">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="#"><i class="zmdi zmdi-notifications text-danger"></i>
            </a>
          </li>
          <li><a href="#">Test User</a></li>
        </ul>
      </div>
    </nav>
	<div class="container" >
  	<form action="../api/product.php" method ="POST" style = "padding: 20px 0px 20px 20px; border-radius: 10px;">
    
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <input type="hidden" name="action" type="update"/>
          <input type="hidden" name="type" type="all"/>

          <label for="name">Product Name</label>
          <input type="text" class="form-control" placeholder="Product Name" id="name" name="name" value = "<?php echo ($book==NULL)?'':$book['name'];?>"  />
        </div>
      </div>
      <!--  col-md-6   -->

      <div class="col-md-2">
        <div class="form-group">
          <label for="quantity">Quantity</label>
          <input type="number" class="form-control" id="quantity" name="quantity"
          value = "<?php echo ($book==NULL)?0:$book['quantity'];?>" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label for="pages_numer">Pages Number</label>
          <input type="number" class="form-control" id="pages_number" name="pages_number" 
          value = "<?php echo ($book==NULL)?0:$book['pages_number'];?>" placeholder="Pages Numer"/>
        </div>
      </div>

      <!--  col-md-6   -->
    </div>


    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="publisher">Publisher</label>
          <input type="text" class="form-control" placeholder="" id="publisher" name="publisher"
          list ="publisher-name" value = "<?php echo ($book==NULL)?'':$book['publisher'];?>" 
          placeholder ="Publisher"
          />
          <datalist id="publisher-name">
            <option value="NXB Đại học quốc gia Hà Nội"/>
            <option value="NXB Tổng hợp TPHCM"/>
            <option value="NXB Đại học quốc gia TPHCM"/>
            <option value="NXB Kim Đồng"/>
          </datalist>
        </div>


      </div>
      <!--  col-md-6   -->

      <div class="col-md-2">

        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" class="form-control" id="price" placeholder="price" 
          value = "<?php echo ($book==NULL)?0:$book['price'];?>" name="price"
          >
        </div>
      </div>
      <div class="col-md-2">

        <div class="form-group">
          <label for="publish_year">Publish Year</label>
          <input type="number" class="form-control" id="publish_year" placeholder="year" name="publish_year">
        </div>
      </div>
      <!--  col-md-6   -->
    </div>
    <!--  row   -->


    <div class="row">
      <div class="col-md-6">

        <div class="form-group">
          <label for="author_name">Author</label>
          <input type="author" class="form-control" id="author_name" placeholder="author" 
          name="author_name"
          value = "<?php echo ($book==NULL)?'':$book['author_name'];?>" />
        </div>
      </div>
      <!--  col-md-6   -->

     <div class="col-md-4">
        <div class="form-group">
          <label for="category">Category</label>
          <select class="form-control" id ="category_id" name="category" value = "<?php echo ($book==NULL)?1:$book['category_id'] ;?>">
            <?php foreach($categories as $cate){?>
              <option value="<?php echo $cate["id"]?>"><?php echo $cate["name"]?></option>
            <?php }?>
          </select>
        </div>
      </div>
      <!--  col-md-6   -->
    </div>
    <div class="row">
      <div class="col-md-10">

        <div class="form-group">
          <label for="short_description">Description</label>
          <textarea class="form-control" id="short_description" placeholder="description"
          name= "short_description" style="height: 100px;"><?php echo ($book==NULL)?'':$book['short_description'] ?></textarea>
        </div>
      </div>
      <!--  col-md-6   -->

     
      <!--  col-md-6   -->
    </div>
    <!--  row   -->
    <div class="row">
        <div class="col-md-2">
          <img id="productImage" src="<?php echo ($book==NULL)?'':$book['path_img']; ?>" class="prod-img"/>
        </div>
        <div class="col-md-4">
        <div class="form-group">
          <label for="path_img">URL Image</label>
          <input type="text" class="form-control" id="path_img" placeholder="url image (http://)" 
          value = "<?php echo ($book==NULL)?'':$book['path_img'] ;?>"
           />

          <div class="py-4">
          <form  method="post" action="" enctype="multipart/form-data" id="myform">
              <input type="file" id="file" name="file"  />
              <div class="row" style="margin-top: 10px; margin-left:2px">
                <input  type="button" class="btn btn-primary" value="Upload" id="but_upload"/>
              </div>
          </form>
          </div>
        
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9"></div>
      <button id="btnSub" type="submit" class="btn btn-primary" style="width: 80px; height: 50px;">Submit</button>    
    </div>
    
    </div>
    
  </form>
</div>
</div>
</body>
</html>