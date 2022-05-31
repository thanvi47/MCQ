<?php
$hostname='localhost';
$user='root';
$pass='';
$db='mcq';
$conn=mysqli_connect($hostname,$user,$pass,$db);
if (!$conn){
    echo 'error'.mysqli_connect_error();
}


?>