<?php 
$from = '1118ptest@gmail.com';
$to = 'r-cho@9point.co.jp';
$subject = '件名: テスト送信';
$message = <<< EOF
{$from}より。

こんにちは。
これはテスト送信です。
EOF;

if (mb_send_mail($to, $subject, $message, "From: {$from}")) {
  echo '送信成功。';
} else {
  echo '送信失敗。<br>エラーログを確認してください。 (xampp\sendmail\error.log)';
}
//if (mb_send_mail('r-cho@9point.co.jp', 'TEST SUBJECT', 'TEST BODY')) {
//    echo  "送信完了" ;
//} else {
//    echo "送信失敗" ;
//}