<?php
	require_once('utils.php');
	include_once ("header.php");
	// 1 cai mang tinh :

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<style>
.comment-box{
    width: 99%;
    height: 40px;
    padding-top: 10px;
    border-radius: 10px;
    border: 0.5px solid #ccc;
    margin-bottom: 10px;
    margin-right: 10px;
}

</style>
	<script type="text/javascript">
		$(document).ready(function(){
			
			let id = <?php echo $pid?>;
			
			$('#btnBuy').click(function(){

				x=$('#quantity').val();
				
				$.ajax({url:'../api/addCart.php', method: 'GET',dataType: 'json',data:{pid: id,count: x}}).done(function(data){
					if(confirm('Do you want to view cart?')){
						window.location='../index.php/cart';

					}
				})
			});

			$("#btnComment").click(function(){
                var logined = <?php echo $logined?>;
                if(!logined){
                    window.location = "../index.php/login?login_type=1";
                }
                else {
                	let contentCmt = $("#comment-content").val();
                	if(contentCmt.length > 5){
                		let pid = <?php echo $pid?>;
                		$.ajax({url : "../api/comment.php" , method : "POST", dataType: "json",
                        data :{action : "add" , product_id : pid, content: contentCmt}}).done(function(data){
                        		if(data.code == 1){
                        			alert("Your comment is submited. Waiting for admin acception.");
                        		}
                        		else alert(data.message);
                        });
                	}
                    else alert("Your comment is too short");
                }

            });
		});
	</script>
	

</head>
<body>
	
	
	<div id="main" style="margin-top: 30px;">
		<div id="left" style="margin-top: 25px;">
			<div id="image_book">
				<img src="<?php echo $book['path_img']?>" width="300px" height="300px" style="object-fit: contain;"/>
			</div>
			<div id="intro_book">
				<h2 style="font-size: 23px;"><?php echo $book['name']?></h2>
				<h3 style="font-size: 20px; text-indent: 10px;margin-top: 0px; float:right; margin-right: 50px;">Price:<span style="color: red;"> <?php echo formatMoney($book['price'])?> đ</span></h3>
				<table class="ordinary" style="width: 650px; min-height: 180px; font-size: 17px;">
					<tr>
						<th>Author</th>
						<td><?php echo $book['author_name']?></td>
					</tr>
					<tr>
						<th>Publisher</th>
						<td><?php echo $book['publisher']?></td>
					</tr>
					<tr>
						<th>Pages number</th>
						<td><?php echo $book['pages_number']?></td>
					</tr>
					<tr>
						<th>Category</th>
						<td><?php echo $categories[(int)$book['category_id']-1]['name']?></td>
					</tr>
				</table>
				<div>
					<input type="number" id="quantity" min="1" max="50" style="float: left;
					margin: 30px 50px 10px 20px; width: 100px;
					" value="1"/>
					<button id="btnBuy" style="margin: 15px 50px 0px 30px; width: 150px; height: 50px;
					float: right;background-color: #000033; color: white; border-radius: 50px;border:none;
					">Buy Now</button>
				</div>
			</div>
			
			<div id="detail">
				<h2 style="margin-top: 0px; margin-bottom: 0px;">Description</h2>	
				<div style="font-size: 16px;padding-top: 10px; padding-bottom: 10px;text-align: justify;">
				<?php echo $book['short_description']?>
				</div>
			</div>
			<div id ="comments">
				<div>
       	 		<textarea class="comment-box" placeholder="Add a comment" id = "comment-content"></textarea>
        			<button id ="btnComment" style="padding: 10px" class="btn btn-primary">Share</button>
    			</div>
				<?php include_once "comment.php"?>
							
									
			</div>
			<div>
				<h2 style="margin-top: 5px;">Relative Products</h2>
				<ul>
					<?php foreach($books as  $b){?>
						<li class="book-item">
							<a href="../index.php/product?pid=<?php echo $b['id']?>">
								<div id="contain-book">
									<img src="<?php echo $b['path_img']?>"/>
									<h3 style="font-size: 17px;padding-top: 10px;"><?php echo reduceName($b['name'])?></h3>
									<div><?php echo formatMoney($b['price'])?></div>
								</div>
							</a>
						</li>
					<?php }?>
				</ul>
			</div>
		</div>
		<?php include_once("side-bar.php")?>
	
	</div>
	<div id="footer"></div>
</body>
</html>
