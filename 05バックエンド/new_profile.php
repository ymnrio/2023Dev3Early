<?php
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8',
'root','root');

$sql="INSERT into user(media,self_introduction)value(?,?) where user_id = ?";

$ps=$pdo->prepare($sql);
$ps->bindValue(1,,PDO::PARAM_STR);
$ps->bindValue(2,$_POST['jikosyoukai'],PDO::PARAM_STR);
$ps->bindValue(3,$_SESSION['user_id'],PDO::PARAM_STR);
$ps->execute();

?>