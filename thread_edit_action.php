<?php
    session_start();

    //ここ何で受け取ればいいのか
    //if($_POST["title"] != ""){//この行周辺の意味
        $err_msg = "";
        $userid =$_SESSION["userid"];
        $title =$_POST["title"];
        $content =$_POST["content"];
        $thread_id = $_POST["thread_id"];
        require_once 'db_connect.php';
        echo $userid, $title, $content, $thread_id;

        $stmt = $dbh->prepare("update threads set title=:title, content=:content where id=:id");
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":content",$content);
        $stmt->bindParam(":id",$thread_id);
        $stmt->execute();
        $dbh = null;
        $message= "編集完了！";
        //データがDBに入ったので画面遷移する
        // header("Location:top.php");
            // exit();//これ意味ないよね？
?>

    <!DOCTYPE html>

    <html>
    <head>
      <meta charset="utf-8"></meta>
      <title>アカウント作成画面</title>
      <link rel"stylesheet" type="text/css" href"common.css">
    </head>
    <body>
      <?php echo $errorMessage?>
      <?php echo $message?>
      <a href="thread.php?thread_id=<?php echo $thread_id ?>">スレッド画面に戻る</a>
    </body>
    </html>
