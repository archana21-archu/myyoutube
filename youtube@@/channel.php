<?php
session_start();
include "./includes/session_check.php";
include './includes/connection.php';
$aa=mysqli_query($con,"SELECT * FROM videos WHERE uploaded_by='".$_SESSION['id']."'");
?>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="img/favicon.ico">
        <script src="js/jquery.js" type="text/javascript"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-2.1.3.min.js" type="text/javascript"></script>
        <title>You Tube</title>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body style="background-color: #f9f5f3;"> 
        <?php include './includes/header.php'; ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div id="page-wrapper" class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row container">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-dropbox fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><h4>26</h4></div>
                                    <div><h3>Suscribers</h3></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Suscribers</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-thumbs-o-up fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><h4>12</h4></div>
                                    <div><h3>Total Likes</h3></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Total Likes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-thumbs-o-down fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><h4>124</h4></div>
                                    <div><h3>Total Dislikes</h3></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Total Dislikes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comment-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><h4>13</h4></div>
                                    <div><h3>Comments</h3></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Total Comments</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="page-wrapper" class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Videos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

        <div class="container">
            <?php while($row=  mysqli_fetch_assoc($aa)){?>
            <a href="home.php?src=<?php echo $row['vid_id']; ?>"><div style="height: 140px; width: 350px; display: inline-block; ">
            <div class="row container" style="margin-top: 20px;">
                                <div class="col-lg-6">
                                    <span style="width: 36px; height: 20px; background-color: #000; color: #fff; z-index: 1; position: absolute; left:139px; top: 80px; border-radius: 3px;"><b><?php echo $row['v_time']; ?></b></span>
                                    <img src='thumbnails/<?php echo $row['v_thumb']; ?>' style="width: 160px; height: 100px;">
                                </div>
                <div class="col-lg-6" style="text-align: center;">
                                    <p><?php echo $row['vid_name']; ?>jhjghjgjh</p>
                                </div>
                            </div>
                </div></a>
            <?php } ?>
    
</div>

        </div>
</body>
</html>
