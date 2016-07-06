<?php
   $name = $_POST['newname'];
   $id =$_POST['number'];
  $link = mysql_connect('127.0.0.1', 'root', '');
$db_selected = mysql_select_db('todo', $link);
mysql_set_charset('utf8');
$result = mysql_query('SELECT id,task FROM todo_list');
$sql = "UPDATE todo_list SET name ='$name' WHERE id ='$id'" ;
$result_flag = mysql_query($sql);
$close_flag = mysql_close($link);
 

?>

    
    </body>
</html>