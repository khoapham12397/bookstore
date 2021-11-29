<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<style type="text/css">
    @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

body {
    background-color: #D32F2F;
    font-family: 'Calibri', sans-serif !important
}

.card-no-border .card {
    border: 0px;
    border-radius: 4px;
    -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05)
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem
}

.comment-widgets .comment-row:hover {
    background: rgba(0, 0, 0, 0.02);
    cursor: pointer
}

.comment-widgets .comment-row {
    border-bottom: 1px solid rgba(120, 130, 140, 0.13);
    padding: 15px
}

.comment-text:hover {
    visibility: hidden
}

.comment-text:hover {
    visibility: visible
}

.label {
    padding: 3px 10px;
    line-height: 13px;
    color: #ffffff;
    font-weight: 400;
    border-radius: 4px;
    font-size: 75%
}

.round img {
    border-radius: 100%
}

.label-info {
    background-color: #1976d2
}

.label-success {
    background-color: green
}

.label-danger {
    background-color: #ef5350
}

.action-icons a {
    padding-left: 7px;
    vertical-align: middle;
    color: #99abb4
}

.action-icons a:hover {
    color: #1976d2
}

.mt-100 {
    margin-top: 100px
}

.mb-100 {
    margin-bottom: 100px
}
</style>
<body>

    <div class="container d-flex justify-content-center mt-100 mb-100">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Comments</h4>
                    <h6 class="card-subtitle">Latest Comments section by users</h6>
                </div>
                <div class="comment-widgets m-b-20">
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2"><span class="round"><img src="https://i.imgur.com/uIgDDDd.jpg" alt="user" width="50"></span></div>
                        <div class="comment-text w-100">
                            <h5>Samso Nagaro</h5>
                            <div class="comment-footer"> <span class="date">April 14, 2019</span> <span class="label label-info">Pending</span> <span class="action-icons"> <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a> <a href="#" data-abc="true"><i class="fa fa-rotate-right"></i></a> <a href="#" data-abc="true"><i class="fa fa-heart"></i></a> </span> </div>
                            <p class="m-b-5 m-t-10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</p>
                        </div>
                    </div>
                    <div class="d-flex flex-row comment-row ">
                        <div class="p-2"><span class="round"><img src="https://i.imgur.com/tT8rjKC.jpg" alt="user" width="50"></span></div>
                        <div class="comment-text active w-100">
                            <h5>Jonty Andrews</h5>
                            <div class="comment-footer"> <span class="date">March 13, 2020</span> <span class="label label-success">Approved</span> <span class="action-icons active"> <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a> <a href="#" data-abc="true"><i class="fa fa-rotate-right text-success"></i></a> <a href="#" data-abc="true"><i class="fa fa-heart text-danger"></i></a> </span> </div>
                            <p class="m-b-5 m-t-10">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites</p>
                        </div>
                    </div>
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2"><span class="round"><img src="https://i.imgur.com/cAdLHeY.jpg" alt="user" width="50"></span></div>
                        <div class="comment-text w-100">
                            <h5>Sarah Tim</h5>
                            <div class="comment-footer"> <span class="date">Jan 20, 2020</span> <span class="label label-danger">Rejected</span> <span class="action-icons"> <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a> <a href="#" data-abc="true"><i class="fa fa-rotate-right"></i></a> <a href="#" data-abc="true"><i class="fa fa-heart"></i></a> </span> </div>
                            <p class="m-b-5 m-t-10">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure</p>
                        </div>
                    </div>
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2"><span class="round"><img src="https://i.imgur.com/uIgDDDd.jpg" alt="user" width="50"></span></div>
                        <div class="comment-text w-100">
                            <h5>Samso Nagaro</h5>
                            <div class="comment-footer"> <span class="date">March 20, 2020</span> <span class="label label-info">Pending</span> <span class="action-icons"> <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a> <a href="#" data-abc="true"><i class="fa fa-rotate-right"></i></a> <a href="#" data-abc="true"><i class="fa fa-heart"></i></a> </span> </div>
                            <p class="m-b-5 m-t-10">It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>