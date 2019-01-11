<?php
session_start();
$userid = $_SESSION["userid"];
$thread_id = $_GET["thread_id"];
require_once 'db_connect.php';
?>
<?php
  $stmt = $dbh->prepare('SELECT * FROM threads WHERE id=?');
  $stmt->execute(array($_GET["thread_id"]));//どこからとった？なぜこれでwhere 一行上のidに直接入る？
  $thread=$stmt->fetch(PDO::FETCH_ASSOC);
  //restmtなに
  $restmt = $dbh->prepare('SELECT * FROM comments WHERE thread_id=?');
  $restmt->execute(array($_GET["thread_id"]));
?>
<!DOCTYPE html>

<html lnag="ja">

  <head>
    <meta charset="utf-8"></meta>
    <title>コメント作成</title>
    <link rel"stylesheet" type="text/css" href"common.css">
  </head>
  <body>
    <?php echo $_GET["errtxt"]; ?>
    <h1>コメント作成</h1>
    <form method="POST" action="comment_action.php">
    <p> コメント<br>
    <textarea name="content" rows="4" cols="40" placeholder="ここにコメントを記入してください"></textarea></p>
    <input type="hidden" name="token" value="<?php echo session_id(); ?>">
    <input type="hidden" name="thread_id" value="<?php echo $thread_id; ?>">
    <p>
      <input type="submit" value="投稿" name="submit">
      <input type="reset" value="キャンセル"><br>
      </form>
    <a href="thread.php?thread_id=<?php echo $thread_id ?>">スレッド画面に戻る</a>
    </p>

  </body>
</html>
