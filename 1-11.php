<!DOCTYPE html>

<html>
<?php
try {
  $dbh = new PDO('mysql:host=localhost; dbname=1_11board; charset=utf8; unix_socket=/tmp/mysql.sock',root, hoge
  array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_EMULATE_PREPARES => false,
    );

}catch (PDOException $e){
  var_dump($e->getMessage());
  exit;
}
?>

<head>
  <meta charset="utf-8"></meta>
  <title>php研修終了テスト</title>
</head>
<body>
</body>

</html>
