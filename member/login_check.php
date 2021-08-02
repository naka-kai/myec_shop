<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php

  session_start();

  $member_mail = $_POST['member_mail'];
  $member_pass = $_POST['member_pass'];

  $error_msg = [];

  if (empty($member_mail)) {
    $error_msg['mail'] = 'メールアドレスが未入力です';
  }
  if (empty($member_pass)) {
    $error_msg['pass'] = 'パスワードが未入力です';
  }

  if (count($error_msg) === 0) :

    echo '<p>下記メールアドレスでログインしますか？</p>';
    echo $member_mail . '<br>';
    $_SESSION['member_mail'] = $member_mail;
    $_SESSION['member_pass'] = $member_pass;

  ?>
    <button type="button" onclick="location.href='login_done.php'">OK</button>
  <?php

  else :

    echo $error_msg['mail'];
    echo '<br>';
    echo $error_msg['pass'];
    echo '<br>';
  ?>
    <button type="button" onclick="location.href='login.php'">ログイン画面へ</button>
  <?php
  endif;
  ?>

</body>

</html>
