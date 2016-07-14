<?php
    $name = $_POST['newname'];
    $id =$_POST['id'];
    require_once '/common/database.php';
    $result=category_edit($name,$id);
    header("Location:http://localhost/todo/category_list.php?name=category");