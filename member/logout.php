<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログアウト画面</title>
</head>

<body>
  <?php
  session_start();

  if (!empty($_SESSION['member_mail']) && !empty($_SESSION['member_pass'])) :

  ?>
    <p>ログアウトしました</p>
    <a href="login.php">ログイン画面へ</a>

  <?php
  else :
    echo '<p>ログイン情報が間違っています</p>';
    echo '<a href="login.php">ログイン画面へ</a>';
    exit();
  endif;
  $_SESSION = array();
  if (isset($_COOKIE['phpsessid'])) {
    setcookie('phpsessid', '', time() - 1800, '/');
  }
  session_destroy();
  ?>

</body>

</html>
