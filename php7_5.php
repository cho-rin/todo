<?php

//php　トレーニング

$hello="こんにちは";
 echo $hello."<br>";
 
 $a="b";
 $b="c";
echo $a."<br>";
$e = <<< HOGE
ヒアドキュメント
ヒアドキュメント
ヒアドキュメント。
HOGE;
  print($e.'<br>');
 //pinrt_r関数は配列の情報を詳しく表示してくれる関数です。 また、キーが数値ではなく文字列を使用したものを連想配列を言います。
   $color['cat']="black";
  $color['dog']="white";
  $color['water']="blue";
  print_r($color);
  print('<br>');

  //PHPには多くの関数がありますが、
  //ユーザーが独自に動作を決めることができる 
  //ユーザー定義関数という仕組みがあります。
  // ユーザー定義関数は以下のようにすることで定義することができます。
  function zeikomi($nedan) {
    $nedan = $nedan * 1.05;
    return $nedan;
  }
  print (zeikomi(100).'<br>');
  
  //if関数
  $point = 100;
  if ($point >= 70) {
    print ("合格");
  }
  else if ($point >= 50) {
    print ("もうちょっと");
  }
  else {
    print ("残念");
  }
  //繰り返し構文
   $a=5;
  while ($a > 0) {
    print ($a."<br />");
    $a--;
  }
  $a=5;
  do {
    print ($a."<br />");
    $a--;
  }while ($a > 10);
  for ($a=0; $a<3; $a++){
    print ($a."<br />");
  }
  ?>
  <html>
<head><title>input.html</title></head>
<body>
入力フォームです。
名前を入力してみましょう。
<form action="output.php" method="post">
  <table border="1">
    <tr>
      <td>名前</td>
      <td><input type="text" name="name"></td>
      <td colspan="2" align="center">
        <input type="submit" value="入力">
      </td>
    </tr>
  </table>
</form>
</body>
</html>
<html>
<html>
<head><title>date.php</title></head>
<body>
<?php
  $time = date("西暦Y年n月j日　H:i");
  print($time);
?>
</body>
</html>

<html>
<head><title>uploader.html</title></head>
<body>
<form method="post" enctype="multipart/form-data" action="uploader.php">
  <input type="file" name="upfile">
  <input type="submit" value="アップロードする">
</form>
</body>
</html>
 