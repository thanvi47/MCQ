<?php
session_start();
require_once 'assets/db.php';
require_once 'assets/nav.php';

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>

<?php
if (!isset($_SESSION['login']))
{



}else{


    $name=$_SESSION['name'];
    $sql1="SELECT * FROM `users`where `name`='$name'";
    $result1=$conn->query($sql1);
    if ($result1->num_rows){
        while ($row1=$result1->fetch_assoc()){
            $type=$row1['type'];
        }
    }
    if ($type==2) {
    echo '
    <div class="container mt-3">
    <form action="/mcq/assets/exam.php" method="post">
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Exam Name</label>
        <textarea class="form-control" name="input" id="exampleFormControlTextarea1" rows="1"></textarea>
        <br>
        <input class="btn btn btn-outline-info" type="submit" value="Add"></input>
    </div>
    </form>

</div>
    ';}

    else {echo '<h2>'.$name.' ready for xm </h2>';}
}


?>
<div class="container">


<table class="table table-striped table-hover bg-outline-info">
    <thead>
    <tr>
        <th scope="col">Sno</th>
        <th scope="col">Teacher Name</th>
        <th scope="col">Exam Name</th>

      <?php
      $name=$_SESSION['name'];
      $sql1="SELECT * FROM `users`where `name`='$name'";
      $result1=$conn->query($sql1);
      if ($result1->num_rows){
          while ($row1=$result1->fetch_assoc()){
              $type=$row1['type'];
          }
      }
      if ($type==2) {


        echo '<th scope="col">Set Question</th>';



   } ?>

        <th scope="col">Exam Sheet</th>

    </tr>
    </thead>
    <tbody class=" container">

    <?php


        $sql=" SELECT * FROM `exams`";
        $result=$conn->query($sql);
        if ($result->num_rows){$i=1;
            while ($row=$result->fetch_assoc()){
                $userid=$row['user_id'];
                $exam_name=$row['exam_name'];
                    $sql2="SELECT * FROM `users`where `id`='$userid'";
                    $result2=$conn->query($sql2);
                    if ($result2->num_rows){
                        while ($row2=$result2->fetch_assoc()){
                            $type1=$row2['type'];
                            $teacher=$row2['name'];


            if (!isset($_SESSION['login'])) {
            }else{
                    if ($type1==2) {

            echo'
            
                
                    <tr>
                        <th scope="row">'.$i.' </th>
                        <td> '.$teacher.' </td>
                        <td> '.$exam_name.' </td>
                     ';?>

              <?php          $name=$_SESSION['name'];
                        $sql1="SELECT * FROM `users`where `name`='$name'";
                        $result1=$conn->query($sql1);
                        if ($result1->num_rows){
                        while ($row1=$result1->fetch_assoc()){
                        $type=$row1['type'];
                        }
                        }
                        if ($type==2) {

                      echo ' <td><a href="/mcq/assets/qrsn.php?id='.$row['id'].'">Go</a></td>'; } ?>



                       <?php echo '
                        <td><a href="/mcq/exam_sheet.php?id='.$row['id'].'">Go</a></td>
                        
                    </tr>';

            ?>



<?php
        }else echo 'xm start soon';
}



            }
        }
  $i++  ;}

}
?>


    </tbody>
</table>
</div>


<div class="container flex-column-reverse">
    <?php
    date_default_timezone_set('asia/dhaka');
    echo date('g:i A');
    ?>


</div>
</body>
</html>
