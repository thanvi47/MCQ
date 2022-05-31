<?php
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


?>