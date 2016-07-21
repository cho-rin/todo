<?php
include_once("connect.php");

$username = stripslashes(trim($_POST['username']));
//$password = md5(trim($_POST['password']));
$password = $_POST['password'];
$mail = trim($_POST['mail']);
$query = mysql_query("select id from user where mail='$mail'");
$num = mysql_num_rows($query);
if($num==1){
	echo '<script>alert("メールアドレスは既に使われてます");window.history.go(-1);</script>';
	exit;
}
$token = md5($username.$password); //创建用于激活识别码
$token_exptime = time()+60*60*24;//过期时间为24小时后
$sql = "insert into user ( user_name , password ,mail ,token , token_exptime ) values ('$username','$password','$mail','$token','$token_exptime')";
mysql_query($sql);

if(mysql_insert_id()){//写入成功，发邮件
	include_once("stmp.php");
	$smtpserver = "smtp.gmail.com"; //SMTP服务器
    $smtpserverport = 25; //SMTP服务器端口
    $smtpusermail = "chibivictini1989@gmail.com"; //SMTP服务器的用户邮箱
    $smtpuser = "chibivictini1989@gmail.com"; //SMTP服务器的用户帐号
    $smtppass = "66991766"; //SMTP服务器的用户密码
    $smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //这里面的一个true是表示使用身份验证,否则不使用身份验证.
    $emailtype = "HTML"; //信件类型，文本:text；网页：HTML
    $smtpemailto = $mail;
    $smtpemailfrom = $smtpusermail;
    $emailsubject = "用户帐号激活";
    $emailbody = "ようこそ".$username."：<br/><br/>ここをおしてすすんでください。<br/><a href='http://localhost/todo/active.php?verify=".$token."' target='_blank'>http://localhost/todo/active.php?verify=".$token."</a><br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。<br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/><p style='text-align:right'>-------- Hellwoeba.com 敬上</p>";
    $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
	if($rs==1){
		$msg = '恭喜您，注册成功！<br/>请登录到您的邮箱及时激活您的帐号！';	
	}else{
		$msg = $rs;	
	}
}
echo $msg;
