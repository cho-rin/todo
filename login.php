<html>
  <meta charset="UTF-8">
  <head>
    <title>ログイン</title>
  </head>
  <body>
    <form action="auth.php" method="post">
      <table>
        <tr>
          <td>メールアドレス</td>
          <td><input type="text" name="mail"></td>
        </tr>
        <tr>
          <td>パスワード</td>
          <td><input type="password" name="password"></td>
        </tr>
      </table>
        <input type="submit" value="ログイン">
    </form>
  </body>
</html>