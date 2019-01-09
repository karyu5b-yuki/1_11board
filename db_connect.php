<?php
try {
  $dbh = new PDO('mysql:host=localhost; dbname=1_11board; charset=utf8; unix_socket=/tmp/mysql.sock',root, hoge);
}catch (Exception $e){
  var_dump($e->getMessage());
  echo "DB接続失敗";
  exit;
}
?>
