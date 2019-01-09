<?php
session_start();
$errorMessage = "";
if (isset($_POST["create"])) {
  if (empty($_POST["name"])) {
    // $errorMessage = 'ユーザーIDが未入力です。';
    header("Location:create_account.php?errormessage=EnptyError!");
    exit();
  }
  else if (empty($_POST["password"])) {
    $errorMessage = 'パスワードが未入力です。';
    header("Location:create_account.php?errmessage=EnptyError!");
    exit();
  } //else if ($_POST["name"]がすでにデータベース内にあるデータと一致する){};
  else{
      $name = $_POST["name"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      // var_dump ($name,$email,$password);
      require_once 'db_connect.php';

      // //もしセレクトして何かが帰って来てしまったら、
      // $stmt = $dbh->prepare("select from users (name, email, password) values(:name,:email,:password)");
      // $stmt->bindParam(":name",$name);
      // $stmt->bindParam(":email",$email);
      // $stmt->bindParam(":password",$password);
      // $stmt->execute();
      //
      // $errorMessage = 'そのアドレスはすでに登録されています。';

      $stmt = $dbh->prepare("insert into users (name, email, password) values(:name,:email,:password)");
      $stmt->bindParam(":name",$name);
      $stmt->bindParam(":email",$email);
      $stmt->bindParam(":password",$password);
      $stmt->execute();
      $dbh = null;
      //header ("Location: login.php");
      $message= "登録完了！";
      //この後なんで移動ボタン現れないのか
    }
  }
    ?>

    <!DOCTYPE html>

    <html>
    <head>
      <meta charset="utf-8"></meta>
      <title>アカウント作成画面</title>
      <link rel"stylesheet" type="text/css" href"common.css">
    </head>
    <body>
      <?php echo $errorMessage?>
      <?php echo $message?>
      <a href="create_account.php">ログイン画面に戻る</a>
    </body>
    </html>
