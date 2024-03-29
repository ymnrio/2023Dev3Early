<?php
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');

$sql = "DELETE FROM favorite_genre WHERE user_id = ?";
$ps = $pdo->prepare($sql);
$ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_INT);
$ps->execute();

$sql = "DELETE FROM post WHERE user_id = ?";
$ps = $pdo->prepare($sql);
$ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_INT);
$ps->execute();

$sql = "DELETE FROM reply WHERE user_id = ?";
$ps = $pdo->prepare($sql);
$ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_INT);
$ps->execute();

$sql = "DELETE FROM user WHERE user_id = ?";
$ps = $pdo->prepare($sql);
$ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_INT);
$ps->execute();

$_SESSION = array();
session_destroy();
unset($_SESSION['user']['id']);

header('Location:01_トップ画面.php');
?>