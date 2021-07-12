<?php
session_start();
error_reporting();
include './includes/connection.php';
if (isset($_POST['sub'])) {
       $res = mysqli_query($con, "SELECT * FROM `signup` WHERE email='" . $_POST['email'] . "' AND password='" . $_POST['pass'] . "' ");
        $user_row = mysqli_num_rows($res);
    $login = false;
    if ($user_row > 0) {
        $login = true;
        $row = mysqli_fetch_assoc($res);
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['uname'] = $row['user_name'];
        $_SESSION['dp'] = $row['pic'];
        header("location:channel.php");
        exit;
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
        <title>YouTube</title>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body style="background-color: #f9f5f3;"> 
        <?php include './includes/header.php'; ?>
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if (isset($_POST['sub'])) { ?>
                            <div class="alert alert-block alert-success fade in">
                                <strong>Sign Up is Successfully Done..</strong> 
                            </div> 
                        <?php } ?>
                        <section class="panel">
                            <header class="panel-heading">
                                <h4>Login</h4>
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="">
                                        
                                        <div class="form-group ">
                                            <label for="cemail" class="control-label col-lg-2">E-Mail<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input class="form-control " id="cemail" type="email" name="email" placeholder="Email" required />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="curl" class="control-label col-lg-2">Password<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input class="form-control " type="password" name="pass" placeholder="Password"  required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-primary" type="submit" value="save" name="sub">Login</button>
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