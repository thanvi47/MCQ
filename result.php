<?php
session_start();
require 'assets/db.php';
require 'assets/find.php';
require 'assets/nav.php';

if (!isset($_SESSION['login']))
{

header('location:/mcq/');

}else {

    $name = $_SESSION['name'];
    $sql = find('users', 'name', $name);
//    $sql = "SELECT * FROM `users` where `name`='$name'";
//    $result=$conn->query($sql);
    $user_id=$sql[0]['id'];
$i=0;
    $sql3 = find('results', 'user_id', $user_id);
while ($i<count($sql3
    )) {

    $mark = $sql3[$i]['mark'];
    $dt = $sql3[$i]['dt'];

    $exam_id = $sql3[$i]['exam_id'];

    echo ' Id ='.$user_id .'<br>' .' Name = '. $name .'<br>' .'Mark = '. $mark .'<br>';
$i++;



    $sql2=find('exams','id',$exam_id);
    $subject=$sql2[0]['exam_name'];
    $exam_id=$sql2[0]['id'];


    echo 'Subject - '.$subject.'<Br>'. $dt.'<Br>'.'<br>';

}

}
date_default_timezone_set('asia/dhaka');
echo date('g:i A');

?>
<div class="container my-3">
<a href="/mcq/"><input type="submit"class="btn btn-info" value="GO Back"></a>
</div>