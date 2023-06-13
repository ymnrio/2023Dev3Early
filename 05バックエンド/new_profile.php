<?php
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8',
'root','root');

$fileName = $_FILES['file']['name'];

$sql="update user set media=?,self_introduction=? where user_id = ?";

$ps=$pdo->prepare($sql);
$ps->bindValue(1,$fileName,PDO::PARAM_STR);
$ps->bindValue(2,$_POST['jikosyoukai'],PDO::PARAM_STR);
$ps->bindValue(3,$_SESSION['user_id'],PDO::PARAM_STR);
$ps->execute();

?>