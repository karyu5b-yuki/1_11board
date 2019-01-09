<?php
  session_start();
  ?>

<!DOCTYPE html>
<?php
    $err_msg1 = "";
    $err_msg2 = "";
    $err_msg3 = "";
    if (isset($_POST["login"])){
        if (empty($_POST["email"])) {
            $err_msg1 = 'ユーザーIDが未入力です。';
            exit();
        }
        if (empty($_POST["password"])) {
            $err_msg2 = 'パスワードが未入力です。';
            exit();
        }
        else if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        $password = $_POST["password"];
        include 'dbaccess.php';
        //レコード挿入 prepred statement でescape処理も自動で行われる
        //placeholfer用いてSQLインジェクション対策
        $stmt=$dbh->prepare("insert into users (name,password) values(?,?)");
        $stmt->execute(array($_POST["email"],$_POST["password"]));
        header("Location: top.php");  // login画面へ遷移
            echo "ユーザ登録が完了しました";
            exit();  // 処理終了
        } else {// 認証失敗
            $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
        }
    }
?>
<html lnag="ja">

<head>
  <meta charset="utf-8"></meta>
  <title>ログイン画面</title>
  <link rel"stylesheet" type="text/css" href"common.css">
</head>
<body>
  <?php //require_once 'login_action.php'
  $$err_msg1 = $_POST["$err_msg1"];
  $$err_msg2 = $_POST["$err_msg2"];
  ?>
  <h1>Login</h1>
  <form method="POST" action="login_action.php">
    <p> メールアドレス<br>
      <input type="text" name="email" size="40"/></p>
      <?php echo $err_msg1; ?>

      <p> Password<br>
        <input type="password" name="password" size="40"/>
        <input type="hidden" name="token" value="<?php echo session_id(); ?>"></p>
        <?php echo $err_msg2; ?>
        <p>
          <input type="submit" value="LogIn" name="login">
          <input type="submit" value="キャンセル" name="cancel"></p>
          <p>
            <a href="create_account.php">新規アカウント作成</a></p>
          </form>
        </body>
        </html>
