<?php
include_once("connect.php");
$username = stripslashes(trim($_POST['username']));
//$password = md5(trim($_POST['password']));
$password = $_POST['password'];
$repassword=$_POST['repassword'];
$mail = trim($_POST['mail']);
$query = mysql_query("select id from user where mail='$mail'");
$pattern="/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
if(preg_match($pattern,$mail)){
} else{
    echo '<script>alert("メールアドレスを確認してください");window.history.go(-1);</script>';
    exit;
}
$num = mysql_num_rows($query);
if($num==1){
	echo '<script>alert("メールアドレスは既に使われてます");window.history.go(-1);</script>';
	exit;
}
if (strlen($password)<6){
     echo '<script>alert("パスワードは6桁以上で入力してください");window.history.go(-1);</script>';
    exit;
}
if($password!=$repassword){
    echo '<script>alert("パスワードは一致してません");window.history.go(-1);</script>';
    exit;
}
$token = md5($username.$mail); //トークン
$sql = "insert into user ( user_name , password ,mail ,token) values ('$username','$password','$mail','$token')";
mysql_query($sql);

//メール送信
$from = 'とぅーどぅ';
$to = $mail;
$subject = '件名: テスト送信';
$message = <<< EOF
{$from}より。

{$username}　様
こんにちは。
これはテスト送信です。
EOF;

if (mb_send_mail($to, $subject, $message, "From: {$from}","From:{$username}")) {
  echo 'メールが送信成功しました。';
}