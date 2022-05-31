<?php
session_start();
require 'db.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $ans=$_POST['ans'];
    $exam_id=$_POST['exam_id'];

$count=0;
    foreach ($ans as $key=>$value){
        echo "Question is ".$key." and the ans is ".$value."<br>";
        $qsn=find('qrsns','id',$key);
        if($qsn!=null){

            if($value=$qsn[0]['ans']==$value){
                $count++;
            }
        }


    }
    echo 'Your Mark is - '. $count;
    if (!isset($_SESSION['login']))
    {



    }else {

        $name=$_SESSION['name'];
        $tableCreate = " CREATE TABLE `mcq`.`results` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `exam_id` INT NOT NULL ,
                    `mark` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $result2 = $conn->query($tableCreate);
        $user_id=find('users','name',$name);
        $userid=$user_id[0]['id'];

//        $exam_id=find('exams','user_id',$userid);
//        $examid=$exam_id[0]['id'];
      // echo $exam_id.$userid;
        $sql3=" INSERT INTO `results`(`user_id`, `exam_id`, `mark`) VALUES ('$userid','$exam_id','$count')";
        $result3=$conn->query($sql3);
        header('location:/mcq/result.php');
    }

}

function find($tableName,$colomnName,$searchParam){
    require 'db.php';
    $sql = "SELECT *  FROM `$tableName` WHERE `$colomnName` = '$searchParam'";

    $result1=$conn->query($sql);

    $result=[];
    if ($result1->num_rows){
        while ($row=$result1->fetch_assoc()){
            array_push($result,$row);
        }
        return $result;
    }
    else
       return null;
}