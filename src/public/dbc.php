<?php 
//DB接続
$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
  'mysql:host=mysql; dbname=booksmanagement; charset=utf8',
  $dbUserName, 
  $dbPassword
);
?>