<?php
    session_start();
    require_once 'db_connect.php';
    $stmt = $dbh->prepare('DELETE FROM comments WHERE id =?');
    $stmt->execute(array($_POST["thread_id"]));
    $dbh = null;
    $message = 'スレッドを消去できました';
    // header("Location:top.php");

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>削除結果</title>
</head>
<body>
  <div>削除されました</div>
  <a href="top.php">トップ画面に戻る</a>

  <?php echo $_POST["thread_id"]?>
</body>
</html>

//  header("Location:main.php?id=".$row["threadId"]);
