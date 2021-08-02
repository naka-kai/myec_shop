<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録完了画面</title>
</head>

<body>
  <?php
  session_start();

  if (!empty($_SESSION['member_name']) && !empty($_SESSION['member_mail']) && !empty($_SESSION['member_pass'])) {
    try {

      $member_name = $_SESSION['member_name'];
      $member_mail = $_SESSION['member_mail'];
      $member_pass = $_SESSION['member_pass'];

      $dsn = 'mysql:host=localhost;dbname=myec_shop;charset=utf8';
      $db_user = 'root';
      $db_pass = 'root';

      $pdo = new PDO($dsn, $db_user, $db_pass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'INSERT INTO users(name, mail, password) VALUES (?, ?, ?)';
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$member_name, $member_mail, password_hash($member_pass, PASSWORD_DEFAULT)]);

      echo '<h2>登録完了</h2>';
      echo '<p>登録が完了しました。</p>';

      $_SESSION = array();
      if (isset($_COOKIE['phpsessid'])) {
        setcookie('phpsessid', '', time() - 1800, '/');
      }
      session_destroy();

      echo '<a href="login.php">ログイン</a></p>';
    } catch (PDOException $e) {
      // echo $e->getMessage();
      echo '<p>エラーが発生しました。</p>';
      echo '<p>もう一度やり直して下さい。</p>';
      echo '<a href="signup.php">登録画面へ</a>';
    }
  } else {
    echo '<p>ユーザー登録をして下さい</p>';
    echo '<a href="signup.php">ユーザー登録画面へ</a>';
    exit();
  }
  ?>
</body>

</html>
