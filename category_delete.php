<?php
$name=$_GET['number'];
require_once '/common/database.php';
$result=database("DELETE FROM category WHERE id =".$name);
header("Location:http://localhost/todo/category_list.php?name=category");
?>