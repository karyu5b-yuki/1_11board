<?php
session_start();
$userid = $_SESSION["userid"];
require_once 'db_connect.php';
?>
<?php
  $stmt = $dbh->prepare('SELECT * FROM threads WHERE id=?');
  $stmt->execute(array($_GET["thread_id"]));
  $thread=$stmt->fetch(PDO::FETCH_ASSOC);
  //restmtなに
  $restmt = $dbh->prepare('SELECT * FROM comments WHERE thread_id=?');
  $restmt->execute(array($_GET["thread_id"]));
?>

<!DOCTYPE html>

<html lang="ja">

  <head>
    <meta charset="utf-8"></meta>
    <title>スレッド編集</title>
    <link rel"stylesheet" type="text/css" href"common.css">
  </head>
  <body>
    <h1>スレッド編集</h1>
    <form method="POST" action="thread_edit_action.php">
    <p> スレタイトル<br>
    <input type="text" name="title" value="<?php echo $thread['title']?>" size="40"/></p>
    <?php echo $thread['title']?>
    <p> 説明<br>
    <textarea name="content" rows="4" cols="40"> <?php echo $thread['content']?></textarea></p>
    <input type="hidden" name="token" value="<?php echo session_id(); ?>">
    <input type="hidden" name="thread_id" value="<?php echo $_GET["thread_id"];?>">
    <!-- 無理やり送ってるけどあってる？ -->
    <p>
      <input type="submit" value="編集" name="edit">
    </form>
      <input type="submit" value="キャンセル" name="cancel"><br>
      <a href="thread.php?thread_id=<?php echo $thread_id ?>">スレッド画面に戻る</a>
    </p>

  </body>
</html>
