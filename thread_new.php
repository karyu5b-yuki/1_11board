<!DOCTYPE html>

<html lnag="ja">

  <head>
    <meta charset="utf-8"></meta>
    <title>スレッド新規作成</title>
    <link rel"stylesheet" type="text/css" href"common.css">
  </head>
  <body>
    <?php echo $_GET["errtxt"]; ?>
    <h1>スレッド新規作成</h1>
    <form method="POST" action="thread_new_action.php">
    <p> スレタイトル<br>
    <input type="text" name="title" size="40" required></p>
    <p> 説明<br>
    <textarea name="content" rows="4" cols="40" placeholder="ここにスレッドの説明を記入してください"></textarea></p>
    <input type="hidden" name="token" value="<?php echo session_id(); ?>">
    <!-- ↑なんでいるんやっけ -->
    <p>
      <input type="submit" value="投稿" name="submit">
    </form>
      <input type="reset" value="キャンセル" name="cancel"><br>
      <a href="top.php">スレッド一覧に戻る</a>
    </p>

  </body>
</html>
