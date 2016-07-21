<?php
    $completed_at = date("Y-m-d H:i:s");
    $id = $_GET['id'];
    session_start();
    $user_id=$_SESSION['user_id'];
     require_once '/common/database.php';
    $result= completed($completed_at,$id,$user_id);
//   完成したらポイント+10
    $result=get_point($user_id);
    $result=database("select * from todo_list where id='$id'");
    $row =$result->fetch_assoc();
    $datetime= new DateTime($row['completed_at']);
    $current= new DateTime($row['created_at']);
    $diff = $current->diff($datetime);
    if($diff->d==0 and $diff->h<completed_time){
        $result=get_point($user_id);
    } 
     $now_day = date("d");
     $result=  database("update completed set today_completed= today_completed+1,week_completed= week_completed+1 where user_id='$user_id'");

    header("Location:http://localhost/todo/todo_list.php"); 