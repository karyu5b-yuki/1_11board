<?php
session_start();
$userid = $_SESSION["userid"];
require_once 'db_connect.php';
?>
<?php
  $stmt = $dbh->prepare('SELECT * FROM comments WHERE id=?');
  $stmt->execute(array($_GET["comment_id"]));
  $comment=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>

<html lang="ja">

  <head>
    <meta charset="utf-8"></meta>
    <title>コメント編集</title>
    <!-- <link rel"stylesheet" type="text/css" href"common.css"> -->
  </head>
  <body>
    <?php echo $_POST["comment_id"]?>
    <h1>コメント編集</h1>
    <p> コメント<br>
    <form method="POST" action="comment_edit_action.php">
    <textarea name="content" rows="4" cols="40"> <?php echo $comment['content']?></textarea></p>
    <input type="hidden" name="token" value="<?php echo session_id(); ?>">
    <input type="submit" value="編集" name="edit">
    <input type="hidden" name="comment_id" value="<?php echo $_GET["comment_id"];?>">
    <input type="hidden" name="thread_id" value="<?php echo $_GET["thread_id"];?>">
    </form>
      <input type="reset" value="キャンセル" name="cancel"><br>
      <a href="thread.php?thread_id=<?php echo $thread['id'] ?>">スレッド画面に戻る</a>
    </p>

  </body>
</html>
