<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "rajitha";


$conn = mysqli_connect($hostname,$username,$password,$dbname);

if(!$conn){
    die("connection failed".mysqli_connect_errno());
}

?>

