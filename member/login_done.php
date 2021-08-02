<?php
session_start();

if(!empty($_SESSION['member_mail']) && !empty($_SESSION['member_pass'])) {

  $member_mail = $_SESSION['member_mail'];
  $member_pass = $_SESSION['member_pass'];
} else {
  echo '<p>ログイン情報が間違っています</p>';
  echo '<a href="login.php">ログイン画面へ</a>';
  exit();
}

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
  try {

    $dsn = 'mysql:host=localhost;dbname=myec_shop;charset=utf8';
    $db_user = 'root';
    $db_pass = 'root';

    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM users WHERE mail=:mail';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':mail' => $member_mail));

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // if($row['mail'] === $member_mail && $row['password'] === $member_pass) {
      if(password_verify($member_pass, $row['password']) && $row['mail'] === $member_mail) {
      echo '<p>ログイン成功</p>';
      $_SESSION['member_login'] = 1;
      $_SESSION['member_name'] = $row['name'];
      echo '<a href="../home.php">ホーム画面へ</a>';
    } else {
      echo '<p>ログイン情報が間違っています</p>';
      echo '<a href="login.php">ログイン画面へ</a>';
    }

  } catch (PDOException $e) {

    echo $e->getMessage();
    echo '<p>エラーが発生しました。</p>';
    echo '<p>もう一度やり直して下さい。</p>';
    echo '<a href="/member/login.php">登録画面へ</a>';
  }
  ?>

</body>

</html>
