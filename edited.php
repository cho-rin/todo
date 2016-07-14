<?php
    $task = $_POST['task'];
    $id =$_POST['id'];
    $category_id=$_POST['category_id'];
    require_once '/common/database.php';
    $result = edit_todo($task,$category_id,$id);
    header("Location:http://localhost/todo/todo_list.php");
?>
