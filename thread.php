<?php
session_start();
$userid = $_SESSION["userid"];
require_once 'db_connect.php';
?>
<?php
  $stmt = $dbh->prepare('SELECT * FROM threads WHERE id=?');
  $stmt->execute(array($_GET["thread_id"]));
  $thread=$stmt->fetch(PDO::FETCH_ASSOC);
  //restmtなに
  $restmt = $dbh->prepare('SELECT * FROM comments WHERE thread_id=?');
  $restmt->execute(array($_GET["thread_id"]));
?>
<!DOCTYPE html>

<html lang="ja">
  <head>
    <meta charset="utf-8"></meta>
    <title>スレッド詳細</title>
    <link rel"stylesheet" type="text/css" href"common.css">
  </head>
  <body>
    <h1>Title：<?php echo htmlspecialchars($thread['title']); ?></h1>
    <h5> login: <?php echo "$userid"; ?>さん</h5>
    <a href= "top.php">スレッド一覧に戻る</a>
    <h3>スレッド内容</h3>
    <fieldset>
        <div class="thread">
        <?php echo htmlspecialchars($thread['content']);?>
        </div>
    </fieldset>

    <?php if($thread["users_id"]==$userid):?>
    <div style="display:inline-flex" style="margin:20px;">
      <a href='./thread_edit.php?thread_id=<?php echo $thread['id']?>'><span style="padding-right:10px;">編集</span></a>
      <form method="post" action="thread_edit.php?thread_id=<?php echo $thread['id']?>">
      <a href='./thread_delete.php?thread_id=<?php echo $thread['id']?>'>削除</a>
      <form method="post" action="thread_delete.php?thread_id=<?php echo $thread['id']?>">
    </div>
    <?php endif; ?>


    <h3>コメント</h3>
<!-- ここの対応！ -->
    <fieldset>
      <ol>
        <?php foreach($restmt->fetchAll(PDO::FETCH_ASSOC) as $commentinfo):?>
          <li class="thread">
            <?php echo htmlspecialchars($commentinfo["content"]);?>
            <?php if($commentinfo["users_id"]==$userid):?>
            <a href='./thread_edit.php?comment_id=<?php echo $commentinfo['id']?>&type=res'>編集</a>//&type=resとは
            <form method="post" action="delete.php">
              <p>
                <input type="submit" name="delete" value="削除">
              </p>
                <input type="hidden" name="thread_id" value=<?php echo $thread['id'];?>>//確認
            </form>
            <?php endif; ?>//end処理確認
          </li>
        <?php endforeach; ?>
      </ol>
    </fieldset>
    <a href="comment.php?thread_id=<?php echo $thread['id']?>">コメント追加</a>
    <form method="post" action="comment.php?thread_id=<?php echo $thread['id']?>">
</div>
</body>
</html>
