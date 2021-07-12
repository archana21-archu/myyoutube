<?php 
$host = "localhost";
$user = "root";
$password = "";
$database = "test";
$con=mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno() > 0) {
    echo "error ocurred!...";
    exit;
}
?>