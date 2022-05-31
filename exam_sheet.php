<?php
require 'assets/db.php';

session_start();

require 'assets/nav.php';
if ($_SERVER['REQUEST_METHOD']=='GET');
{
    $exam_id = $_GET['id'];
    $user_name = $_SESSION['name'];
    if (!isset($_SESSION['login'])) {
    }else{



        ?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Sno</th>
        <th scope="col">Question</th>
        <th scope="col">Option 1</th>
        <th scope="col">Option 2</th>
        <th scope="col">Option 3</th>
        <th scope="col">Option 4</th>
<!--        <th scope="col">Answer Submit</th>-->
    </tr>
    </thead>
    <form action="assets/ans.php" method="post">
<?php
 $i=1;
        $sql="SELECT * FROM `qrsns` WHERE `exam_id`='$exam_id' ";
        $resutl=$conn->query($sql);
        if ($resutl->num_rows){
            while ($row=$resutl->fetch_assoc()){

            echo '
                <tbody>
    <tr>
      
          
        <th scope="row">'.$i.'</th>
        <td>'.$row['qrsn'].'</td>
        
       
        <td><input type="checkbox" value="'.$row['op1'].'" name="ans['.$row['id'].']">'.$row['op1'].' </td>
        <td><input type="checkbox" value="'.$row['op2'].'" name="ans['.$row['id'].']">'.$row['op2'].' </td>
        <td><input type="checkbox" value="'.$row['op3'].'" name="ans['.$row['id'].']"> '.$row['op3'].'</td>
        <td><input type="checkbox" value="'.$row['op4'].'" name="ans['.$row['id'].']"> '.$row['op4'].'</td>
          <input type="hidden" name="exam_id" value="'.$exam_id.'">

            
            ';
$i++;

            }
        }

echo '

    </tr>
    </tbody>
</table>
    <input type="submit" class="btn btn-primary" value="submit">
    </form>
';




    }

}

?>


