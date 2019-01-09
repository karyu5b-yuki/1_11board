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
        //リダイレクト(成功時main.php,失敗時再度thread_new.php)

            header("Location:top.php");
            exit();
    }else{
        $err_msg = 'タイトルを入力してください';
        header("Location:thread_new.php?errtxt=EnptyError!");
        exit();
    }
?>

<?php
if(isset($_POST['submit'])){
  $str = '投稿されました';
}else{
  $str = '投稿されていません';
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>投稿結果</title>
</head>
<body>
  <div><?php echo($str) ?></div>
</body>
</html>*/

//  header("Location:main.php?id=".$row["threadId"]);
