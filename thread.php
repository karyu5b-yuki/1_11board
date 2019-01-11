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
  $stmt = $dbh->prepare('SELECT * FROM comments WHERE threads_id=?');
  $stmt->execute(array($_GET["thread_id"]));
  $comment = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>

<html lang="ja">
  <head>
    <meta charset="utf-8"></meta>
    <title>スレッド詳細</title>
    <link rel"stylesheet" type="text/css" href"common.css">
  </head>
  <body>
    <script>
    function submitChk () {
        var flag = confirm ("送信してもよろしいですか？\n\n送信したくない場合は[キャンセル]ボタンを押して下さい");
        /* send_flg が TRUEなら送信、FALSEなら送信しない */
        return flag;
    }
</script>
  <h1>Title：<?php echo htmlspecialchars($thread['title']); ?></h1>
  <h5> login: <?php echo "$userid"; ?>さん</h5>
  <a href= "top.php">スレッド一覧に戻る</a>
  <h3>スレッド内容</h3>
  <fieldset>
      <div class="thread">
      <?php echo nl2br(htmlspecialchars($thread['content']));?>
      </div>
  </fieldset>

  <?php if($thread["users_id"]==$userid):?>
  <div style="display:inline-flex" style="margin:20px;">
    <form method="post" action="thread_edit.php?thread_id=<?php echo $thread['id']?>">
      <a href='./thread_edit.php?thread_id=<?php echo $thread['id']?>'><span style="padding-right:10px;">編集</span></a>
    </form>
    <form method="post" action="thread_delete_action.php" >
    <input type="submit" name="delete" value="削除">
    <input type="hidden" name="thread_id" value="<?php echo $thread['id'];?>">
    </form>

  </div>
  <?php endif; ?>


  <h3>コメント</h3>
  <fieldset>
    <ol>
      <?php foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $comment):?>
        <li class="comment">
          <?php echo nl2br(htmlspecialchars($comment["content"]));?>　

          <?php if($comment["users_id"]==$userid):?>
          <div style="display:inline-flex" style="margin:20px;">
              <a href='./comment_edit.php?comment_id=<?php echo $comment['id']?>&thread_id=<?php echo $thread['id']?>'><span style="padding-right:10px;">編集</span></a>
          <form method="post" action="comment_delete_action.php">
              <input type="submit" name="delete" value="削除">
              <input type="hidden" name="comment_id" value="<?php echo $comment['id'];?>">
              <input type="hidden" name="thread_id" value="<?php echo $thread['id'];?>">

          </form>
          </div>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
      </ol>
    </fieldset>
    <a href="comment.php?thread_id=<?php echo $thread['id']?>">コメント追加</a>
    <form method="post" action="comment.php?thread_id=<?php echo $thread['id']?>">
</div>
</body>
</html>
