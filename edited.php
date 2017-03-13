<?php
    $task = $_POST['task'];
    $id =$_POST['id'];
    $category_id=$_POST['category_id'];
    $type_id=$_POST['type_id'];
    require_once '/common/database.php';
    $tasked = $_POST['tasked'];
    $result = edit_todo($task,$category_id,$type_id,$id,$tasked);
    header("Location:http://localhost/todo/todo_list.php");
