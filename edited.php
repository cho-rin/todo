<?php
   $name = $_POST['newname'];
   $id =$_POST['id'];
   $re=$_POST['sen'];
 $link = new mysqli('127.0.0.1','root','','todo');
    $link->set_charset('utf8');
    $result = $link->query("SELECT id FROM category WHERE name='".$re."';");
   $row =$result->fetch_assoc();
  $sen=$row['id'];
$result = $link->query("UPDATE todo_list SET task ='".$name."', category_id ='".$sen."' WHERE id =".$id.";");
header("Location:http://localhost/todo/todo_list.php");
?>
