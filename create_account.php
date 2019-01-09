<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8"></meta>
  <title>アカウント作成画面</title>
  <link rel"stylesheet" type="text/css" href"common.css">
</head>
<body>
  <h1>アカウント作成</h1>
  <form action= "create_account_action.php" method="POST">
    <?php echo htmlspecialchars($_GET["errormessage"]); ?>
  <p> Username<br/>
    <input type="text" name="name" size="40"/>
  </p>
  <p> Mail Address<br/>
    <input type="text" name="email" size="40"/>
  </p>
  <p> Password<br/>
    <input type="hidden" name="token" value="<?php echo session_id(); ?>"></p>
    <input type="password" name="password" size="40"/>
  </p>
  <p>
    <input type="submit" value="CREATE" name="create">
    <input type="reset" value="CANCEL" name="cancel">
    <p> <a href="login.php">ログイン画面に戻る</a></p>
  </p>
</form>
</body>
</html>
