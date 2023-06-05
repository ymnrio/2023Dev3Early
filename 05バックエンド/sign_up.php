<?php
$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8',
'root','');
$sql="INSERT INTO user(email_address,password,user_name)VALUES(?,?,?)";
$ps=$pdo->prepare($sql);
$ps->bindValue(1,$_POST['email'],PDO::PARAM_STR);
$ps->bindValue(2,password_hash($_POST['password'],PASSWORD_DEFAULT),PDO::PARAM_STR);
$ps->bindValue(3,$_POST['new_password'],PDO::PARAM_STR);
$ps->execute();
header('03_新規登録画面.php');
?>