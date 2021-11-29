<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="../css/admin-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<script type="text/javascript">

		function changePrice(event){
			if(event.keyCode ==13){
				let nprice = $("#"+event.target.id).val();
				let id = event.target.id.split('-')[1]; 
				let inp = event.target;
							
				$.ajax({url : "../api/product.php" ,method : "POST", dataType : "json",
					data : {action : "update" , type : "partial" , field: "price", value : nprice ,pid : id } }).done(function(data){
								if(data.code!=1) {
									alert(data.message);

								}
								else {inp.blur(); }
					});
				
				event.preventDefault();
			}
		}
		
		function changeName(event){
			if(event.keyCode == 13){
				let nname = $("#"+event.target.id).val();
				let id = event.target.id.split('-')[1]; 
				let inp = event.target;
				//alert(nname);
			
				$.ajax({url : "../api/product.php" ,method : "POST", dataType : "json",
					data : {action : "update" , type : "partial" , field: "name", value : nname ,pid : id } }).done(function(data){
								if(data.code!=1) {
									alert(data.message);
								}
								else inp.blur();
					});
				
				event.preventDefault();
				//$.ajax({url : ""})

			}
		}

		function changeQuantity(event){
				if(event.keyCode ==13){
				let nquantity = $("#"+event.target.id).val();
				let id = event.target.id.split('-')[1]; 
				let inp = event.target;
							
				$.ajax({url : "../api/product.php" ,method : "POST", dataType : "json",
					data : {action : "update" , type : "partial" , field: "quantity", value : nquantity ,pid : id } }).done(function(data){
								if(data.code!=1) {
									alert(data.message);

								}
								else {inp.blur(); }
					});
				
				event.preventDefault();
			}
		}
		function activeEdit(){

		}
	</script>
	
</head>
<body>
	 <div id="viewport" >
	<?php include "control-bar.php";?>
	<nav class="navbar " style="background-color: #263238;margin-top:0px; border-radius: 0px;">

      <div class="row">
		<div class="col-md-9">
		<form action="../admin.php/products" method="GET">
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-xs-6 col-md-6">
      	
		<div class="input-group">
        <input type="hidden" name="option" value="key" />
				<input type="text" class="form-control" placeholder="Search by keyword" id="txtSearchKey"
				name = "q"/>
		
        <div class="input-group-btn" >
          <button class="btn btn-primary" type="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </div>
      	</div>

		</div>
  		
		</div>
		</form>
		<div>
       
      </div>
    </nav>
	
	<table class="table">
		<thead><tr>
		<th>ID</th>
		<th>Image</th>
		<th>Name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Option</th>
		</tr>
		</thead>
	
		<?php foreach($result->data as $book){?>
			<tr>
				<td><a href="#"><?php echo $book["id"]?></a></td>
				<td><img  style="width: 100px; height:100px" src = "<?php echo $book["path_img"]?>" /></td>
				<td>
					<textarea style="margin-top: 20px; width: 500px;" class="form-control" value= "<?php echo $book["name"]?>"
					id="name-<?php echo $book['id']?>" onkeypress = "changeName(event)"><?php echo $book["name"]?></textarea>
				</td>
				<td>
					<input class="form-control" type="number" id ="price-<?php echo $book['id']?>"
						onkeypress= "changePrice(event)" value="<?php echo $book['price']?>"
						style="margin-top: 30px" />
				</td>
				<td>
					<input class="form-control" type="number" id ="quantity-<?php echo $book['id']?>"
						onkeypress= "changeQuantity(event)" value="<?php echo $book['quantity']?>"
						style="margin-top: 30px" />
				</td>
				<td>
					<a href="../admin.php/edit-product?pid=<?php echo $book['id']?>" style="margin-top: 30px" class="btn btn-primary">Extend Edit</a>
				</td>
			</tr>
		<?php }?>
	</table>
	<?php
		echo $Paginator->createLinks(1,"pagination");
	?>
	</div>
</body>
</html>