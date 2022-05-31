<?php
session_start();
require_once 'db.php';
require_once 'nav.php';



    $sql = "  CREATE TABLE `mcq`.`exams` ( `id` INT NOT NULL , `user_id` INT NOT NULL , `exam_name` varchar NOT NULL ) ENGINE = InnoDB";
        $result = $conn->query($sql);
    $sql2=" ";

    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $input=$_POST['input'];
//        echo $name;
        $name=$_SESSION['name'];

        if ($input!=null) {
            $sql2 = "SELECT * FROM `users`where `name`='$name'";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows) {
                while ($row = $result2->fetch_assoc()) {

                    $user_id = $row['id'];
                    echo $user_id;
                    $sql3 = "INSERT INTO `exams`(`user_id`, `exam_name`) VALUES ('$user_id','$input')";
                    $result3 = $conn->query($sql3);
                    if (!$result3) {
                        echo 'not insert';
                    } else {echo 'insert'; header('location:/mcq/');}


                }


            }

        }else echo 'fill data first  ';

}

?>