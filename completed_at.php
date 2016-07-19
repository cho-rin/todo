<?php
    $completed_at = date("Y-m-d H:i:s");
    $id = $_GET['id'];
    session_start();
    $user_id=$_SESSION['user_id'];
     require_once '/common/database.php';
    $result= completed($completed_at,$id,$user_id);
    $result=database("select point from point where id='$user_id'");
    $row =$result->fetch_assoc();
    $point=$row['point'];
    $point=$point+10;
    $result=database("UPDATE point SET point='$point' WHERE id='$user_id'");
    $result=database("select * from todo_list where id='id'");
    $row =$result->fetch_assoc();
    $datetime = new DateTime($row["completed_at"]);
    $current = new DateTime($row["created_at"]);
    $diff = $current->diff($datetime);
    $CUR_TIME = "2:00:00";
    echo $diff ;
                
                
//    header("Location:http://localhost/todo/todo_list.php");  ?>