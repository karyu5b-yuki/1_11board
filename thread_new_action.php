<?php
    session_start();

    if($_POST["title"] != ""){
        $err_msg = '';
        $userid =$_SESSION["userid"];
        $title =$_POST["title"];
        $content =$_POST["content"];
        require_once 'db_connect.php';
        $stmt = $dbh->prepare("insert into threads (title,users_id,content) value (:title,:userid,:content)");
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":userid",$userid);
        $stmt->bindParam(":content",$content);
        $stmt->execute();
        $dbh = null;

            header("Location:top.php?newthread=投稿されました");//URLがダサく見えてしまう
            exit();
    }else{
        $err_msg = 'タイトルを入力してください';
        header("Location:thread_new.php?errtxt=EnptyError!");
        exit();
    }
?>
