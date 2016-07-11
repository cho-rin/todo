<?php
   $name = $_POST['newname'];
   $id =$_POST['id'];
 require_once '/common/database.php';
 $result=  edit_todo($name, $id);
header("Location:http://localhost/todo/todo_list.php");
?>
