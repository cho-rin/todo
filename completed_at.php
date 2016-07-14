<?php
 $completed_at = date("Y-m-d H:i:s");
 $id = $_GET['id'];
  require_once '/common/database.php';
 $result= completed($completed_at,$id);
 header("Location:http://localhost/todo/todo_list.php");