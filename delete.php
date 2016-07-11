<?php
$name=$_GET['number'];
require_once '/common/database.php';
$result=  delete_todo($name);
header("Location:http://localhost/todo/todo_list.php");
?>
