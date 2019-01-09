<?php
$userid = $_SESSION["userid"];
//thread_new_do.phpからPOSTでerrtxtの受け取り
$err_msg = $_GET["errtxt"];
?>
//とは

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>スレッド新規作成</title>
  <link rel="stylesheet" href = "common.css">
</head>
<body>
  <h2>スレッド新規作成</h2>
  <form action="thread_new_action.php" method="post">
    スレッドタイトル<br>
    <input type=text name="title"><br>
    本文<br>
    <textarea name="content" cols="30" rows="3"></textarea>
    <input type="hidden" name="token" value="<?php echo session_id(); ?>"></p>
    <input type="submit" value="投稿">
    <p><a href="top.php"戻る</a></p>
    </form>
  </body>
  </html>
