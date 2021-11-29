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
          function reduceContent(s){
            s=s.substring(0,80) + "...";
            return s;
          }
          var waitComments = [];
          var tblComments  = $("#tbl-comments");

          $.ajax({url : "/bookstore/api/comment.php?action=get_pending_comments", method:"GET",dataType: "json"}).done(function(data){
              waitComments = data.data;

              for(let i=0;i<waitComments.length;i++){
                  let tr = $('<tr></tr>');
                  let commentId = waitComments[i].id;
                  let tdUsername = $("<td></td>");
                  let userLink = $("<a></a>").attr("href","#");
                  userLink.text(waitComments[i].username);
                  tdUsername.append(userLink);
                  let tdProduct = $("<td></td>");
                  let prodLink = $("<a></a>").attr("href","#");
                  prodLink.text(waitComments[i].product_id);
                  tdProduct.append(prodLink);
                  let tdContent = $("<td></td>");
                  let content = waitComments[i].content;

                  if(content.length > 100){
                      let n_content = reduceContent(content);
                      let ct = $("<span></span>").text(n_content);
                      let btnMore = $("<button>Read more</button>").attr("class","btn-more");
                      
                      btnMore.click(function(){
                        while(tdContent.firstChild){
                          tdContent.removeChild(tdContent.firstChild);
                        }
                        tdContent.text(content);
                      });
                      
                      ct.append(btnMore);
                      tdContent.append(ct);
                  }
                  else tdContent.text(content);
                  let tdState = $("<td></td>").attr("style","color: #FFCC00");
                  tdState.text("pending");

                  let tdAc = $("<td></td>");
                  
                  let btnAc= $("<button>Accept</button>").attr("class","btn-accept");

                  btnAc.click(function(){

                      let sendData = {action : "change_state",comment_id: commentId, comment_state : 1};
                      $.ajax({url : "/bookstore/api/comment.php" , method : "POST",dataType: "json",data : sendData }).done(function(res){

                          alert(JSON.stringify(res));
                          
                          if(res.code == 1) {
                              tdState.text("accepted");
                              tdState.attr("style","color: green");
                          }
                          else alert(res.message);
                          
                      });
                  });
                  tdAc.append(btnAc);
                  let tdRemove = $("<td></td>");
                  let btnRemove= $("<button>Remove</button>").attr("class","btn-remove");

                  btnRemove.click(function(){

                      let sendData = {action : "change_state",comment_id: commentId, comment_state : 2};
                      $.ajax({url : "/bookstore/api/comment.php" , method : "POST",dataType: "json",data : sendData }).done(function(res){
                          if(res.code == 1) {
                              tdState.text("removed");
                              tdState.attr("style","color : red");
                          }
                          else alert(res.message);
                          
                      });
                  });
                  tdRemove.append(btnRemove);
                  tr.append(tdUsername,tdProduct,tdContent,tdState,tdAc,tdRemove);
                  tblComments.append(tr);
              }
          });
      });
    </script>
</head>

<body>
    <div id="viewport" >
    <?php include_once "control-bar.php"?>

  <!-- Content -->
  <div id="content">
    
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
    <div>
    <section class="main-content">
    <div class="container">
    
      <div class="row">
        <div class="col-sm-3 offset-sm-2">
          <div class="stat-card">
            <div class="stat-card__content">
              <p class="text-uppercase mb-1 text-muted">Revenue</p>
              <h2><i class="fa fa-dollar"></i> 1,254</h2>
              <div>
                <span class="text-success font-weight-bold mr-1"><i class="fa fa-arrow-up"></i> +5%</span> 
                <span class="text-muted">vs last 28 days</span>
              </div>
            </div>
            <div class="stat-card__icon stat-card__icon--success">
              <div class="stat-card__icon-circle">
                <i class="fa fa-suitcase"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="stat-card">
            <div class="stat-card__content">
              <p class="text-uppercase mb-1 text-muted">Users</p>
              <h2>21,254</h2>
              <div>
                <span class="text-danger font-weight-bold mr-1"><i class="fa fa-arrow-down"></i> -5%</span> 
                <span class="text-muted">vs last 28 days</span>
              </div>
            </div>
            <div class="stat-card__icon stat-card__icon--primary">
              <div class="stat-card__icon-circle">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="stat-card">
            <div class="stat-card__content">
              <p class="text-uppercase mb-1 text-muted">Products</p>
              <h2>21,254</h2>
              <div>
                <span class="text-danger font-weight-bold mr-1"><i class="fa fa-arrow-down"></i> -5%</span> 
                <span class="text-muted">vs last 28 days</span>
              </div>
            </div>
            <div class="stat-card__icon stat-card__icon--primary">
              <div class="stat-card__icon-circle">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="stat-card">
            <div class="stat-card__content">
              <p class="text-uppercase mb-1 text-muted">Page Views</p>
              <h2>21,254</h2>
              <div>
                <span class="text-danger font-weight-bold mr-1"><i class="fa fa-arrow-down"></i> -5%</span> 
                <span class="text-muted">vs last 28 days</span>
              </div>
            </div>
            <div class="stat-card__icon stat-card__icon--primary">
              <div class="stat-card__icon-circle">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    </div>
    
    <div>
      <h2 style="margin: 10px;"><b>Pending Comments</b></h2>
      <table class="table table-striped" style="width: 90%; margin-left: 5%" id="tbl-comments">
      <thead>
        <tr>
            <th>Username</th>
            <th>Product ID</th>
            <th>Content</th>
            <th>State</th>
            <th>Accept</th>
            <th>Remove</th>
        </tr>
      </thead>
       
    </table>
    </div>

  </div>
</div>
</body>
</html>