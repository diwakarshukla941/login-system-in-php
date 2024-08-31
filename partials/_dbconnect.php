<?php
$servername = "localhost";
$username  = "root";
$password = "";
$db = "users";

$conn = mysqli_connect($servername,$username,$password,$db);

if(!$conn){
    echo "successfully connected";
       die("error".mysqli_connect_error());
}

?>
