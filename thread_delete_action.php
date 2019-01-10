<?php
    session_start();
    $commentid = _$GET
    require_once 'db_connect.php';
    $stmt = $dbh->prepare("delete from comments where id =?";
    $stmt->execute(array($_GET["thread_id"]));
    $dbh = null;
        header("Location:top.php");
        exit();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>削除結果</title>
</head>
<body>
  <div>削除されました</div>
</body>
</html>

//  header("Location:main.php?id=".$row["threadId"]);
