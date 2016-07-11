<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once 'utils.php'; //関数呼び出しより手前に記述する

    echo('sum: '.utl_sum(12,5).'<br/>');
    echo('mul: '.utl_mul(12,5).'<br/>');
    echo('div: '.utl_div(12,5).'<br/>');
    echo('sub: '.utl_sub(12,5).'<br/>');
    ?>
  </body>
</html