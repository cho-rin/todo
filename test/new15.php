<?php
$name=$_POST['name'];
session_start();
$_SESSION['name']=$name;
echo $_SESSION['name'];
?>
<meta http-equiv="refresh" content="0;URL=http://localhost/todo/test/session.php">
