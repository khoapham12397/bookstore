<script type="text/javascript">
	function reduceContent(s){
            s=s.substring(0,80) + "...";
            return s;
          }
	function showComments(data,tblComments){
        comments = data.data;

            for(let i=0;i<comments.length;i++){
                  let tr = $('<tr></tr>');
                  let commentId = comments[i].id;
                  //let tdUsername = $("<td></td>");
                 
                  let tdProduct = $("<td></td>");
                  let prodLink = $("<a></a>").attr("href","#");
                  prodLink.text(comments[i].product_id);
                  tdProduct.append(prodLink);
                  let tdContent = $("<td></td>");
                  let content = comments[i].content;

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
                  tdState.text(comments[i].comment_state);

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
                  tr.append(tdProduct,tdContent,tdState,tdAc,tdRemove);
                  tblComments.append(tr);
              }
    };
</script>