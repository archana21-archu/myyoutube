<?php
session_start();
include './includes/connection.php';
if (isset($_GET['src'])) {
    $v = mysqli_query($con, "SELECT views FROM videos WHERE vid_id='" . $_GET['src'] . "'");
    $vv = mysqli_fetch_assoc($v);
    $view = $vv['views'] + 1;
    mysqli_query($con, "UPDATE `videos` SET `views`='" . $view . "' WHERE vid_id='" . $_GET['src'] . "'");
}
if (isset($_POST['search'])) {
    $sr = mysqli_query($con, "SELECT * FROM videos WHERE vid_name LIKE '%" . $_POST['search_video'] . "%'");
}
$a = mysqli_query($con, "SELECT * FROM videos");
?>
<html> 
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="img/yt.ico">
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
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 container-fluid">
                <div class="nav search-row" id="top_menu">
                    <!--  search form start -->
                    <ul class="nav top-menu">                    
                        <li>
                            <form class="navbar-form" method="POST">
                                <div class="row">
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <center>
                                            <input class="form-control" placeholder="Search Video" type="text" name="search_video" style="width: 95%;"></center></div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><center><input type="submit" name="search" value="Search" id="dd" class="btn btn-primary btn-sm" ></center></div>
                                </div>
                            </form>
                            <br>
                            <?php if (isset($_POST['search'])) { ?>
                                <?php while ($row2 = mysqli_fetch_assoc($sr)) { ?>
                                    <div class="list-group">
                                        <a  href="home.php?src=<?php echo $row2['vid_id']; ?>">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <span style="width: 36px; height: 20px; background-color: #000; color: #fff; z-index: 1; position: absolute; left:109px; top: 60px; border-radius: 3px;"><b><?php echo $row2['v_time']; ?></b></span>
                                                    <img src='thumbnails/<?php echo $row2['v_thumb']; ?>' style="width: 130px; height: 80px;">
                                                </div>
                                                <div class="col-lg-8">
                                                    <b><?php echo $row2['vid_name']; ?></b>
                                                </div>
                                            </div>
                                        </a>
                                    </div>



                                    <?php
                                }
                            }
                            ?>

                        </li>                    
                    </ul>
                    <!--  search form end -->                
                </div>
                <video style="width: 100%; height: 500px;" controls>
                    <source src="video/<?php echo $_GET['src']; ?>" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video><?php
                $d = mysqli_query($con, "SELECT * FROM videos WHERE vid_id='" . $_GET['src'] . "'");
                $rt = mysqli_fetch_assoc($d);
                ?>
                <h3><?php echo $rt['vid_name']; ?></h3>
                <h4>Views : <?php
                    echo $rt['views'];
                    $c = mysqli_query($con, "SELECT user_name FROM signup WHERE user_id='" . $rt['uploaded_by'] . "'");
                    $cc = mysqli_fetch_assoc($c);
                    ?> | Channel : <?php echo $cc['user_name']; ?> | <?php echo date('d-m-Y', strtotime($rt['uploaded_at'])); ?></h4>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="like"><h3><i class="fa fa-thumbs-up" id="thumbup"></i>: <span id="lc"><?php echo $rt['like']; ?></span></h3></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="dislike"><h3><i class="fa fa-thumbs-down" id="thumbdown"></i>: <span id="dc"><?php echo $rt['dislike']; ?></span></h3></div>

                </div>
            </div>

            <div class="col-lg-4 container">
                <section class="panel">
                    <header class="panel-heading">
                        Suggested Videos
                    </header>
                    <div class="list-group">
                        <a class="list-group-item <?php
                        if (isset($_GET['src'])) {
                            if ($_GET['src'] == 'l.mp4') {
                                echo ' active';
                            }
                        }
                        ?>" href="home.php?src=l.mp4">
                            <div class="row">
                                <div class="col-lg-4">
                                    <span style="width: 36px; height: 20px; background-color: #000; color: #fff; z-index: 1; position: absolute; left:109px; top: 60px; border-radius: 3px;"><b>04:30</b></span>
                                    <img src='img/images.png' style="width: 130px; height: 80px;">
                                </div>
                                <div class="col-lg-8">
                                    <b>Yo Yo Honey Singh : Dil Chori | Sonu Ke Titu Ki Sweety | Kartik Aryan |Nushrat Bharucha|Sunny Singh</b>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="list-group">
                        <a class="list-group-item <?php
                        if (isset($_GET['src'])) {
                            if ($_GET['src'] == 'bluees.mp4') {
                                echo ' active';
                            }
                        }
                        ?> " href="home.php?src=blueeyes.mp4">
                            <div class="row">
                                <div class="col-lg-4">
                                    <span style="width: 36px; height: 20px; background-color: #000; color: #fff; z-index: 1; position: absolute; left:109px; top: 60px; border-radius: 3px;"><b>04:30</b></span>
                                    <img src='img/images.png' style="width: 130px; height: 80px;">
                                </div>
                                <div class="col-lg-8">
                                    <b>Yo Yo Honey Singh : Blue Eyes | Sonu Ke Titu Ki Sweety | Kartik Aryan | Nushrat Bharucha |Sunny Singh</b>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php while ($row = mysqli_fetch_assoc($a)) { ?>
                        <div class="list-group">
                            <a class="list-group-item <?php
                            if (isset($_GET['src'])) {
                                if ($_GET['src'] == $row['vid_id']) {
                                    echo ' active';
                                }
                            }
                            ?> " href="home.php?src=<?php echo $row['vid_id']; ?>">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <span style="width: 36px; height: 20px; background-color: #000; color: #fff; z-index: 1; position: absolute; left:109px; top: 60px; border-radius: 3px;"><b><?php echo $row['v_time']; ?></b></span>
                                        <img src='thumbnails/<?php echo $row['v_thumb']; ?>' style="width: 130px; height: 80px;">
                                    </div>
                                    <div class="col-lg-8">
                                        <b><?php echo $row['vid_name']; ?></b>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php } ?>

                </section>


            </div>




        </div>


        <?php if (!$_SESSION['id']) { ?>
            <script>
                $(document).ready(function () {
                    $("#thumbup").die();
                    $("#thumbdown").die();
                });
            </script>
        <?php } ?>


        <script>
            $(document).ready(function () {
                $("#like").on("click", function () {
                    $("#thumbup").removeClass("fa-thumbs-up");
                     id = '<?php echo $_GET['src']; ?>';
                    var data = {action: "like", vid_id: id};
                    $.get("ajax.php", data, function (res) {
                         alert(res);
                        $("#lc").html(res).closest("div").hide().fadeIn();
                    });
                    $("#thumbup").addClass("fa-thumbs-o-up");
              }

                });
                $("#dislike").on("click", function () {
                    $("#thumbdown").removeClass("fa-thumbs-down");
                    var id = '<?php echo $_GET['src']; ?>';
                    var data = {action: "dislike", vid_id: id};
                    $.get("ajax.php", data, function (res) {
                         alert(res);
                        $("#dc").html(res).closest("div").hide().fadeIn();
                    });
                    $("#thumbdown").addClass("fa-thumbs-o-down");
                }
                });
            });
        </script>

    </body>
</html>
