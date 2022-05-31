<?php
session_start();
require_once 'db.php';
require 'nav.php';
if ($_SERVER['REQUEST_METHOD']=='GET');
{
    $exam_id=$_GET['id'];
//    echo $exam_id;
    $user_name=$_SESSION['name'];
//    echo $user_name;
    $sql1=" SELECT * FROM `exams` where `id`='$exam_id'";
    $result1=$conn->query($sql1);
    if ($result1->num_rows) {
        while ($row = $result1->fetch_assoc()) {
            $user_id = $row['user_id'];
            $sql2 = " SELECT * FROM `users` where `name`='$user_name'";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows) {
                while ($row1 = $result2->fetch_assoc()) {
                    $type = $row1['type'];

                    if (!isset($_SESSION['login'])) {
                    } else {
                        if ($type == 2) {

                            echo '


<div class="container">
        <form method="post" action="/mcq/assets/qrsn_insert.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Question</label>
                    <input type="text" class="form-control" name="qrsn" id="exampleInputEmail1" aria-describedby="emailHelp">

                  </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">1.</label>
                    <input type="text" class="form-control" name="op1" id="exampleInputPassword1">
                </div><div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">2.</label>
                    <input type="text" class="form-control" name="op2" id="exampleInputPassword1">
                </div><div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">3.</label>
                    <input type="text" class="form-control"name="op3" id="exampleInputPassword1">
                </div><div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">4.</label>
                    <input type="text" class="form-control"name="op4" id="exampleInputPassword1">
                </div><div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Answer</label>
                    <input type="text" class="form-control" name="ans" id="exampleInputPassword1">
                </div>
            <input type="hidden" name="id" value=' . $exam_id . '>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


';
                        }else{ echo 'studens'; header('location:/mcq/');}
                    }
                }
            }
        }
    }



}

    ?>