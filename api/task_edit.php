<?php
    $task = $_POST['task'];
    $id =$_POST['id'];
    $category_id=$_POST['category_id'];
    $type_id=$_POST['type_id'];
    require_once '/common/database.php';
    $tasked = $_POST['tasked'];
    $result = edit_todo($task,$category_id,$type_id,$id,$tasked);
 header( "Content-Type: application/json; charset=utf-8" ) ;
$result=database("select * from todo_list 
        left outer join category on todo_list.category_id = category.id
        left outer join user on todo_list.user_id = user.id
        left outer join type on todo_list.type_id = type.id
        where todo_list.task= '$task' ORDER BY todo_list.id DESC;");
        $row =$result->fetch_assoc();
$edited=array(
        "user_name"  => $row['user_name'],
        "category" => $row['name'],
        "task"   => $row['task']
);
echo json_encode($edited);
