<?php
session_start();

$err_msg1 ="";
$err_msg2 ="";
$email = $_POST["email"];
$password = $_POST["password"];

//if(!($userid==""&&$password=="")){
require_once 'db_connect.php';

$stmt = $dbh-> prepare("select * from users where email= :email and password = :password");
$stmt->bindParam(":email",$email);
$stmt->bindParam(":password",$password);
$stmt->execute();
$row = $stmt->fetch();

$dbh = null;

//if(isset($_POST["login"]) === true){
if($email === "") $err_msg1 = "アドレスを入力してください";
if($password === "") $err_msg2 = "パスワードを入力してください";

//if($err_msg1 === "" && $err_msg2 === ""){
//  $message ="書き込みに成功しました。";


if($row["email"] == $email && $row["password"] == $password){
  $_SESSION["userid"] = $row["id"];
  header("Location:top.php");
  exit();
}else{
  //echo "$err_msg1";
  //echo "$err_msg2";
  header("Location:login.php");
  exit();
}

?>
