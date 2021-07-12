<?php
include './includes/connection.php';
//print_r($_POST);
if (isset($_POST['sub'])) {
    if ($_FILES['pic']['error'] == 0) {
        $ext = end(explode(".", $_FILES['pic']['name']));
        $shakti = 'IMG_' . rand(100, 999) . rand(0, 9) . rand(0, 9) . rand(0, 9) . date('mdyhis') . "." . $ext;
        move_uploaded_file($_FILES["pic"]["tmp_name"], "user_pics/" . $shakti);
        $id = 'U' . rand(100, 999) . rand(0, 9) . rand(0, 9) . rand(0, 9) . date('mdy');
        mysqli_query($con, "INSERT INTO `login`(`user_id`, `user_name`, `email`, `password`, `user_pic`, `user_dob`) VALUES ('" . $_POST['id'] . "','" . $_POST['fullname'] . "','" . $_POST['email'] . "','" . $_POST['pass'] . "','" . $_POST['pic'] . "','" . $_POST['dob'] . "')");
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
        <title>upload  video</title>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body style="background-color: #f9f5f3;"> 
        <?php include './includes/header.php'; ?>
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        print_r($_FILES);
                        if (isset($_POST['sub'])){ 
                            ?>
                            <div class="alert alert-block alert-success fade in">
                                <strong>Sign Up is Successfully Done..</strong> 
                            </div> 
                        <?php } ?>
                        <section class="panel">
                            <header class="panel-heading">
                                Sign Up
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="form-validate form-horizontal" id="feedback_form" enctype="multipart/form-data" method="POST" action="">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">Full Name <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="cname" name="fullname" type="text" required />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="cemail" class="control-label col-lg-2">E-Mail <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input class="form-control " id="cemail" type="email" name="email" required />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="curl" class="control-label col-lg-2">Password<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input class="form-control " type="password" name="pass"  required/>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">User Pic <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input  id="subject" name="pic" type="file" required />
                                            </div>
                                        </div>                                      
                                        <div class="form-group ">
                                            <label for="ccomment" class="control-label col-lg-2">DOB</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="subject" name="dob" type="date" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-primary" type="submit" value="save" name="sub">Save</button>
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