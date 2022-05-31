<?php
$login=false;
require_once 'db.php';
if ($_SERVER['REQUEST_METHOD']=='POST'){

    $name=$_POST['name'];
    $pass=$_POST['pass'];

//echo $name.$pass;

$sql=" SELECT * FROM `users` where `name`='$name'";
$result=$conn->query($sql);
$data=mysqli_fetch_assoc($result);
if ($data['password']==md5($pass)){
    echo 'login';
    session_start();
    $login=true;

    $_SESSION['login']=true;
    $_SESSION['name']=$name;
    header('location:/mcq');

    }
else{
    echo 'not match';
}



}



?>