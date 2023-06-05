<?php
$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8',
'root','');
$sql="SELECT*FROM user WHERE user_mail=?";
$ps=$pdo->prepare($sql);
$ps->bindValue(1,$_POST['email'],PDO::PARAM_STR);
$ps->execute();
$userData=$ps->fetchAll();
header('02_ログイン画面.php');
?>