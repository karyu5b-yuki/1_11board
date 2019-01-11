<?php
    session_start();
        $userid =$_SESSION["userid"];
        $title =$_POST["title"];
        $content =$_POST["content"];
        $thread_id = $_POST["thread_id"];
        require_once 'db_connect.php';

        $stmt = $dbh->prepare("update threads set title=:title, content=:content where id=:id");
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":content",$content);
        $stmt->bindParam(":id",$thread_id);
        $stmt->execute();
        $dbh = null;
        $message= "編集完了！";

?>

    <!DOCTYPE html>

    <html>
    <head>
      <meta charset="utf-8"></meta>
      <title>アカウント作成画面</title>
      <link rel"stylesheet" type="text/css" href"common.css">
    </head>
    <body>
      <?php echo $message ?>
      <a href="thread.php?thread_id=<?php echo $thread_id ?>">スレッド画面に戻る</a>
    </body>
    </html>
