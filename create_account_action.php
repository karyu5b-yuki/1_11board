<?php
session_start();
$errorMessage = "";
if (isset($_POST["create"])) {
  if (empty($_POST["name"])) {
    header("Location:create_account.php?errormessage=EnptyError!");
    exit();
  }
  else if (empty($_POST["password"])) {
    $errorMessage = 'パスワードが未入力です。';
    header("Location:create_account.php?errmessage=EnptyError!");
    exit();
  }
  else{
      $name = $_POST["name"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      require_once 'db_connect.php';

      //もしセレクトして何かが帰って来てしまったらエラーを返す。、
      $stmt = $dbh->prepare("select count(*) from users where email = $email");
      $stmt->execute();
      $dbcheck = $stmt -> fetchColumn();
      if ($dbcheck){
        header("Location:create_account.php?errmessage=そのアドレスはすでに登録されています");
      }

      else{
      $stmt = $dbh->prepare("insert into users (name, email, password) values(:name,:email,:password)");
      $stmt->bindParam(":name",$name);
      $stmt->bindParam(":email",$email);
      $stmt->bindParam(":password",$password);
      $stmt->execute();
      $dbh = null;
      header("Location:login.php?message=登録完了");
    }
    }
  }
    ?>
