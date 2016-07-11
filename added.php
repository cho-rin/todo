<head><title>追加できました</title></head>
<body>
<?php
  $name = $_POST['name'];
  $time = date("Y-m-d H:i:s");
  require_once '/common/database.php';
 $result=  add_todo($name,$time);
header("Location:http://localhost/todo/todo_list.php");
?>

    
    </body>
</html>

