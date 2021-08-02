<?php
session_start();


require_once('../common.php');

if (isset($_POST['member_name'])) {
  $_SESSION['member_name'] = h($_POST['member_name']);
  $member_name = $_SESSION['member_name'];
}
if (isset($_POST['member_mail'])) {
  $_SESSION['member_mail'] = h($_POST['member_mail']);
  $member_mail = $_SESSION['member_mail'];
}
if (isset($_POST['member_pass'])) {
  $_SESSION['member_pass'] = h($_POST['member_pass']);
  $member_pass = $_SESSION['member_pass'];
}
if (isset($_POST['member_pass2'])) {
  $_SESSION['member_pass2'] = h($_POST['member_pass2']);
  $member_pass2 = $_SESSION['member_pass2'];
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー登録入力確認画面</title>
</head>

<body>
  <?php
  $error = [];

  if (empty($member_name)) {
    $error['name'] = '<p>お名前を入力して下さい</p>';
  }
  if (empty($member_mail)) {
    $error['mail'] = '<p>メールアドレスを入力して下さい</p>';
  }
  if (!filter_var($member_mail, FILTER_VALIDATE_EMAIL)) {
    $error['mail_2'] = '<p>正しくメールアドレスを入力して下さい</p>';
  }
  if (empty($member_pass)) {
    $error['pass'] = '<p>パスワードを入力して下さい</p>';
  }
  if (!preg_match('/\A[a-z\d]{8,100}+\z/i', $member_pass)) {
    $error['pass_2'] = '<p>パスワードは半角英数字8文字以上100文字以下で入力して下さい</p>';
  }
  if (empty($member_pass2) || $member_pass !== $member_pass2) {
    $error['pass2'] = '<p>パスワードを再入力して下さい</p>';
  }
  if (count($error) === 0) :
  ?>
    <h2>入力確認</h2>
    <form action="signup_done.php" method="post">
      <p>お名前：<?php echo $member_name; ?></p>
      <p>メールアドレス：<?php echo $member_mail; ?></p>
      <button type="button" onclick="location.href='signup.php'">戻る</button>
      <input type="submit" value="登録">
    </form>
  <?php
    exit();
  else :
    echo $error['name'];
    echo $error['mail'];
    echo $error['mail_2'];
    echo $error['pass'];
    echo $error['pass_2'];
    echo $error['pass2'];
  ?>
    <button type="button" onclick="location.href='signup.php'">戻る</button>
  <?php
  endif;
  ?>
</body>

</html>
