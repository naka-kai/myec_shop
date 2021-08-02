<?php
session_start();
if (!empty($_SESSION['member_login']) && !empty($_SESSION['member_name'])) :

  $member_name = $_SESSION['member_name'];
?>

  <!DOCTYPE html>
  <html lang="ja">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>

  <body>
  <?php
  echo '<p>ようこそ、' . $member_name . 'さん</p>';
  echo '<a href="member/logout.php">ログアウト</a>';

  // $_SESSION = array();
  // if (isset($_COOKIE['phpsessid'])) {
  //   setcookie('phpsessid', '', time() - 1800, '/');
  // }
  // session_destroy();

else :
  echo '<p>ログイン情報が間違っています</p>';
  echo '<a href="member/login.php">ログイン画面へ</a>';
  exit();
endif;
  ?>
  </body>

  </html>
