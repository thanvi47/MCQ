<?php
require_once 'db.php';
    if ($_SERVER['REQUEST_METHOD']=='POST'){

        $name=$_POST['name'];
        $pass=$_POST['pass'];
        $cpass=$_POST['cpass'];
        $type=$_POST['select'];


        if ($pass==$cpass && $name!=null ){

        if (`mcq`==false) {

            $sql = "CREATE TABLE `mcq`.`users` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(34) NOT NULL , 
                    `password` VARCHAR(255) NOT NULL , `type` INT(24) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB ";

            $result = $conn->query($sql);


            $sql2 = "  INSERT INTO `users`(`name`, `password`, `type`) VALUES ('$name',md5('$pass'),$type)";

            $result2 = $conn->query($sql2);
            if (!$result2){
                echo 'not insert2';
            }else echo 'insert2';

        }else{


            $sql2 = "  INSERT INTO `users`(`name`, `password`, `type`) VALUES ('$name',md5('$pass'),$type)";

            $result2 = $conn->query($sql2);
            if (!$result2){
                echo 'not insert';
            }else echo 'insert';

        }


        }else echo 'password not match';
    }


?>