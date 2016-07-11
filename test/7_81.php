<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>PHPテスト</title>
</head>
<body>

<p>PHPのテストです。</p>

<p>
<?php
function test(){
  print '関数内に処理が移りました<br />';
  print 'GHI<br />';
  print '関数内の処理が終了します<br />';
}

print 'ABC<br />';
print 'DEF<br />';

test();

print 'JKL<br />';
print 'MNO<br />';
?>
</p>

</body>
</html>