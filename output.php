<head><title>追加できました</title></head>
<body>
<?php
  $name = $_POST['name'];
  print ("以下のものを追加できました<br />");
  print ("$name<br />");
  $link = mysql_connect('127.0.0.1', 'root', '');
$db_selected = mysql_select_db('todo', $link);
mysql_set_charset('utf8');
$result = mysql_query('SELECT id,task FROM todo_list');
$sql = "INSERT INTO todo_list (task) VALUES ('$name')";
$result_flag = mysql_query($sql);
$close_flag = mysql_close($link);
?>
    <meta http-equiv="refresh" content="0;URL=http://localhost/todo/7_61.php"
    <a href ="7_61.php? name=キャンセル">元に戻ります</a>
</body>
</html>

