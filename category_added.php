<?php
$name = $_POST['name'];
require_once '/common/database.php';
 $result = database("INSERT INTO category (name) values ('".$name."');");
header("Location:http://localhost/todo/category_list.php?name=category");
?>
