<?php
$name=$_GET['number'];
$link = mysql_connect('127.0.0.1', 'root', '');
$db_selected = mysql_select_db('todo', $link);
mysql_set_charset('utf8');
$sql = sprintf ("DELETE FROM todo_list WHERE id ='$name'");
$result_flag = mysql_query($sql);
$close_flag = mysql_close($link);
header("Location:http://localhost/todo/7_61.php");
?>
