<?php
    $category_id = $_POST['category_id'];
    $task = $_POST['task'];
    $time = date("Y-m-d H:i:s");
    session_start();
    $user_id=$_SESSION['user_id'];
    require_once '/common/database.php';
    $result = add_todo($task,$time,$category_id,$user_id);
    header("Location:http://localhost/todo/todo_list.php");
?>

