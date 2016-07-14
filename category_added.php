<?php
    $name = $_POST['name'];
    require_once '/common/database.php';
     $result = category_add($name);
    header("Location:http://localhost/todo/category_list.php?name=category");
?>
