<?php

include './includes/connection.php';
if ($_GET['action'] == 'like') {
   
    mysqli_query($con, "UPDATE `videos` SET `like`=`like` + 1 WHERE vid_id='" . $_GET['vid_id'] . "'");
    $v = mysqli_query($con, "SELECT  `like` FROM `videos` WHERE  vid_id='" . $_GET['vid_id'] . "'");
    $vv = mysqli_fetch_assoc($v);
    echo $vv['like'];
    ?> 
<?php } 
if ($_GET['action'] == 'dislike') {
   
    mysqli_query($con, "UPDATE `videos` SET `dislike`=`dislike` + 1 WHERE vid_id='" . $_GET['vid_id'] . "'");
    $v = mysqli_query($con, "SELECT  `dislike` FROM `videos` WHERE  vid_id='" . $_GET['vid_id'] . "'");
    $vv = mysqli_fetch_assoc($v);
    echo $vv['dislike'];
    ?> 



<?php } ?>
