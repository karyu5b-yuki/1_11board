<?php
    //require_once();

    session_start();
    $userid = $_SESSION["userid"];
    $errtxt = $_GET["errtxt"]; 
    require_once 'db_connect.php';
    $stmt = $dbh->prepare("select threads.title, threads.id, users.name from threads inner join users on users.id = threads.users_id;");
    $stmt-> execute();
    $threads=$stmt->FetchALL (PDO::FETCH_ASSOC);
    $dbh = null;
?>

 <html>
    <head>
      <meta charset="utf-8">
      <title>スレッド一覧</title>
      <link rel="stylesheet" href = "common.css">
    </head>
    <body>
      <h2>スレッド一覧</h2>
      <h3><a href= "thread_new.php">新規スレッド作成</a></h3>
      <form action="thread_new.php" method="post">
      <h5><a href= "login.php">ログアウト</a></h5>

      <ol class = "thread_list"

      <h2>スレッド一覧<br></h2>
      <?php
      foreach ($threads as $thread): ?>
      <?php $title = $thread['title'];
            $name = $thread['name'];
            $id = $thread['id'];
           ?>

    <span><a href=thread.php?thread_id=<?php echo $id; ?>></span>
    『<?php echo $title;?>』by_<?php echo $name;?><br></a>
    <form method="get" action="thread.php">
     <?php endforeach ?>


    <?php
    /*if ($userid = $thread['id']){
    <a href= "thread_edit.php?>num= <?php echo $thread['id'];?>"edit</a>
    <form action="" method="post">*/?>
</form>
  </body>
</html>
