<?php
session_start();
 require 'db.php';
 require 'nav.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){

        $exam_id=$_POST['id'];
        $qrsn=$_POST['qrsn'];
        $op1=$_POST['op1'];
        $op2=$_POST['op2'];
        $op3=$_POST['op3'];
        $op4=$_POST['op4'];
        $ans=$_POST['ans'];
        echo $exam_id.$qrsn.$op1.$op2.$op3.$op4.$ans;





$sql="CREATE TABLE `mcq`.`qrsns` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `user_id` INT(11) NOT NULL ,
            `exam_id` INT(11) NOT NULL , `qrsn` VARCHAR(2550) NOT NULL , `op1` VARCHAR(255) NOT NULL , `op2` VARCHAR(255) NOT NULL ,
             `op3` VARCHAR(255) NOT NULL , `op4` VARCHAR(255) NOT NULL , `ans` INT(11) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB ";
$result=$conn->query($sql);
$sql1=" SELECT * FROM `exams` where `id`='$exam_id'";
$result1=$conn->query($sql1);
if ($result1->num_rows){
    while ($row=$result1->fetch_assoc()){
        $user_id=$row['user_id'];
        $sql2=" SELECT * FROM `users` where `id`='$user_id'";
        $result2=$conn->query($sql2);
        if ($result2->num_rows){
            while ($row1=$result2->fetch_assoc()){
                $type=$row1['type'];

                if (!isset($_SESSION['login'])) {
                }else{
                    if ($type==2){

 $sql3=" INSERT INTO `qrsns`(`user_id`, `exam_id`, `qrsn`, `op1`, `op2`, `op3`, `op4`, `ans`) 
                VALUES ('$user_id','$exam_id','$qrsn','$op1','$op2','$op3','$op4','$ans')";
                    $result3=$conn->query($sql3);
                    header('location:/mcq/assets/qrsn.php?id='.$exam_id.'');

                }else {echo 'best of luck students';}

                }

            }
        }


    }
}

}

?>