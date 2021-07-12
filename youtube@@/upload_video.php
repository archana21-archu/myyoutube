<?php
session_start();
error_reporting(0);
include './includes/connection.php';
//print_r($_SESSION);
if (isset($_POST['sub'])) {
    if ($_FILES['thumb']['error'] == 0 and $_FILES['video']['error'] == 0 ) {
        $ext1 = end(explode(".", $_FILES['thumb']['name']));
        $ext2 = end(explode(".", $_FILES['video']['name']));
        $thumname = 'thumb_' . rand(100, 999) . rand(0, 9) . rand(0, 9) . rand(0, 9) . date('mdyhis') . "." . $ext1;
        $vid_id='VID_'. rand(100, 999) . rand(0, 9) . rand(0, 9) . rand(0, 9) . date('mdyhis') . "." . $ext2;
        move_uploaded_file($_FILES["thumb"]["tmp_name"], "thumbnails/" . $thumname);
        move_uploaded_file($_FILES["video"]["tmp_name"], "video/" . $vid_id);
        mysqli_query($con, "INSERT INTO `videos`( `vid_id`, `vid_name`, `vid_catogory`, `v_time`, `v_thumb`, `views`, `like`, `dislike`, `uploaded_by`) VALUES ('".$vid_id."','".$_POST['vidname']."','".$_POST['vidcat']."','".$_POST['vidtim']."','".$thumname."','0','0','0','".$_SESSION['id']."')");
    }
}
?>
<html> 
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="img/favicon.ico">
        <script src="js/jquery.js" type="text/javascript"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-2.1.3.min.js" type="text/javascript"></script>
        <title>Upload Videos</title>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body style="background-color:#f9f2f4;">
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                      // print_r($_POST);
                      // echo '<br>';
                      // print_r($_FILES);
                        if (isset($_POST['sub'])) {
                            ?>
                            <div class="alert alert-block alert-success fade in">
                                <strong>Sign Up is Successfully Done..</strong> 
                            </div> 
                        <?php } ?>
                        <section class="panel">
                            <header class="panel-heading">
                                Upload Video
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="form-validate form-horizontal" id="feedback_form" enctype="multipart/form-data" method="POST">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-4">Video Name <span class="required">*</span></label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="cname" name="vidname" type="text" required />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-4">Video <span class="required">*</span></label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="cname" name="video" type="file" required />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="cemail" class="control-label col-lg-4">Video Category <span class="required">*</span></label>
                                            <div class="col-lg-8">
                                                <select name="vidcat" class="form-control">
                                                    <option>Comedy</option>
                                                    <option>Sad Song</option>
                                                    <option>Love Song</option>
                                                    <option>Inspiration Song</option>
                                                    <option>Mashup Song</option>
                                                </select>   
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="curl" class="control-label col-lg-4">Video Time<span class="required">*</span></label>
                                            <div class="col-lg-8">
                                                <input class="form-control " type="time" name="vidtim"  required/>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-4">Thumbnail <span class="required">*</span></label>
                                            <div class="col-lg-8">
                                                <input  id="subject" name="thumb" type="file" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-primary" type="submit" value="save" name="sub">Upload</button>
                                                <button class="btn btn-default" type="reset">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>

            </div>

        </div>



    </body></html>