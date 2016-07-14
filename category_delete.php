<?php
    $id=$_GET['id'];
    require_once '/common/database.php';
    $result=category_delete($id);
    header("Location:http://localhost/todo/category_list.php?name=category");
?>