<?php
    session_start();

    if($_POST["content"] != ""){
        $err_msg = "";
        $userid =$_SESSION["userid"];
        $content =$_POST["content"];
        $thread_id = $_POST["thread_id"];
        require_once 'db_connect.php';
        echo $userid, $content, $thread_id;

        $stmt = $dbh->prepare("insert into comments (users_id, content, threads_id) values (:userid, :content, :thread_id)");
        $stmt->bindParam(":users_id",$userid);
        $stmt->bindParam(":content",$content);
        $stmt->bindParam(":thread_id",$thread_id);
        $stmt->execute();//エラー出る
        $dbh = null;
        $message= "編集完了！";
        // header("Location:comment.php");
        // exit();
}else{
    $err_msg = 'コメントを入力してください';
    header("Location:comment.php?errtxt=EnptyError!");
    exit();
}
?>

    <!DOCTYPE html>
    <!-- //またでない -->

    <html lang="ja">
    <head>
      <meta charset="utf-8"></meta>
      <title>コメント作成画面</title>
      <link rel"stylesheet" type="text/css" href"common.css">
    </head>
    <body>
      <?php echo $errorMessage?>
      <?php echo $message?>
      <a href="thread.php?thread_id=<?php echo $thread_id ?>">スレッド画面に戻る</a>
    </body>
    </html>
