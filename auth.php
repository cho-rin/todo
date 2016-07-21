<?php 
$mail=$_POST['mail'];
$password=$_POST['password'];
session_start();
require_once '/common/database.php';
$result=  database("select id,user_name from user where mail= '$mail' and password = '$password'");
$row =$result->fetch_assoc();
$id=$row['id'];
$name=$row['user_name'];
if(is_null($id)){ 
echo "ログイン失敗しましたメールとパスワードを確認してください"; ?>
<p><a href="login.php"><h2>戻る</h2></a></p>
<p><a href="new.php?">新規登録はこちら</a></p>
<?php }
else{ 
 header("Location: todo_list.php");
 $_SESSION['user_name']=$name;
$_SESSION['user_id']=$id;
}