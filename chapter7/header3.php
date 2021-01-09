<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>PHP Sample Programs</title>
  <link rel="stylesheet" href="style.css"> <!--chap7用に../削除-->
  <script src="https://kit.fontawesome.com/f4e704525f.js" crossorigin="anonymous"></script> <!--これを headタグ内に入れる-->
  
</head>

<body> 

<?php require 'menu.php'; ?>  <!--chap7で追加-->

<?php 
$pdo = new PDO ('mysql: host=localhost; dbname=shop; charset=utf8','ginzo','Wert3333-');

?>