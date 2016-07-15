<?php
    $id=$_GET['id'];
    session_start();
    $user_id=$_SESSION['user_id'];
    require_once '/common/database.php';
    $result=  delete_todo($id,$user_id);
    header("Location:http://localhost/todo/todo_list.php");
?>
