<?php
$type_id=$_POST['type_id'];
$category_id = $_POST['category_id'];
$task = $_POST['task'];
$time = date("Y-m-d H:i:s");
session_start();
$user_id=$_SESSION['user_id'];
require_once '/common/database.php';
$result = add_todo($task,$time,$category_id,$type_id,$user_id);
header( "Content-Type: application/json; charset=utf-8" ) ;
$result=database("select * from todo_list 
        left outer join category on todo_list.category_id = category.id
        left outer join user on todo_list.user_id = user.id
        left outer join type on todo_list.type_id = type.id
        where todo_list.created_at= '$time' ORDER BY todo_list.id DESC;");
        $row =$result->fetch_assoc();
$added=array(
        "user_name"  => $row['user_name'],
        "category" => $row['name'],
        "task"   => $row['task']
);
echo json_encode($added);