<?php
   $name = $_POST['newname'];
   $id =$_POST['id'];
 require_once '/common/database.php';
  $result=database("UPDATE category SET name ='".$name."' WHERE id =".$id.";");
  header("Location:http://localhost/todo/category_list.php?name=category");