<?php
    session_start();
        $err_msg = "";
        $content =$_POST["content"];
        $comment_id = $_POST["comment_id"];
        require_once 'db_connect.php';

        $stmt = $dbh->prepare("update comments set content=:content where id=:id");
        $stmt->bindParam(":content",$content);
        $stmt->bindParam(":id",$comment_id);
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
      <?php echo $err_msg ?>
      <?php echo $message?>
      <a href="thread.php?thread_id=<?php echo $_POST["thread_id"]?>">  スレッド画面に戻る</a>

    </body>
    </html>
