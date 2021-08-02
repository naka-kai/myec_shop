<?php
$_SESSION = array();
if (isset($_COOKIE['phpsessid'])) {
  setcookie('phpsessid', '', time() - 1800, '/');
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
</head>

<body>
  <h2>ログイン</h2>

  <form action="login_check.php" method="POST">
    <div>
      <p><label for="member_mail">メールアドレス</label></p>
      <p><input type="email" name="member_mail"></p>
    </div>
    <div>
      <p><label for="member_pass">パスワード</label></p>
      <p><input type="password" name="member_pass"></p>
    </div>
    <input type="submit" value="ログイン">
  </form>
  <br>
  <a href="signup.php">新規登録</a>
</body>

</html>
