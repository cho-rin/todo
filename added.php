<head><title>追加できました</title></head>
<body>
<?php
$re = $_POST['sen'];
$name = $_POST['name'];
$time = date("Y-m-d H:i:s");
$link = new mysqli('127.0.0.1','root','','todo');
    $link->set_charset('utf8');
    $result = $link->query("SELECT id FROM category WHERE name='".$re."';");
   $row =$result->fetch_assoc();
  $sen=$row['id'];
 $result = $link->query("INSERT INTO todo_list (task,created_at,category_id) values ('".$name."','".$time."','".$sen."');");
header("Location:http://localhost/todo/todo_list.php");
?>

    
    </body>
</html>

