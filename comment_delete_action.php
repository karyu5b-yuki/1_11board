<?php
    session_start();
    // $thread_id_com = $_POST["thread_id_edit"];
    require_once 'db_connect.php';
    $stmt = $dbh->prepare("DELETE FROM comments WHERE id=?");
    $stmt->execute(array($_POST["comment_id"]));
    $dbh = null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>削除結果</title>
</head>
<body>
  <div>削除されました</div>
  <a href="thread.php?thread_id=<?php echo $_POST["thread_id"]?>">  スレッド画面に戻る</a>
</body>
</html>
