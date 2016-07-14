<?php
$id=$_GET['id'];
require_once '/common/database.php';
$result=  delete_todo($id);
header("Location:http://localhost/todo/todo_list.php");
?>
