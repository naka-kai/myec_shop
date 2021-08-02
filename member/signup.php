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
  <title>新規登録画面</title>
</head>

<body>
  <h2>ユーザー登録</h2>
  <form action="signup_check.php" method="POST">
    <div>
      <p><label for="member_name">お名前</label></p>
      <p><input type="text" name="member_name"></p>
    </div>
    <div>
      <p><label for="member_mail">メールアドレス</label></p>
      <p><input type="email" name="member_mail"></p>
    </div>
    <div>
      <p><label for="member_pass">パスワード</label></p>
      <p><input type="password" name="member_pass"></p>
    </div>
    <div>
      <p><label for="member_pass2">パスワード確認</label></p>
      <p><input type="password" name="member_pass2"></p>
    </div>
    <input type="submit" value="確認">
  </form>

  <br>
  <a href="login.php">ログイン</a>
</body>

</html>
