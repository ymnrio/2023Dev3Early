<?php
session_start();
$pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417495-yamatterdb;charset=utf8', 'LAA1417495', 'SOTA1140');
$sql="select * from user where user_id = ?";
$ps=$pdo->prepare($sql);
$ps->bindValue(1,$_SESSION['user_id'],PDO::PARAM_STR);
$ps->execute();

foreach($ps as $row){
    $_SESSION['user'] = ['id' => $row['user_id'], 'name' => $row['user_name'], 'mail' => $row['email_address'], 'password' => $row['password'],
                             'iconmedia' => $row['media'], 'introduction' => $row['self_introduction']];
}
$_SESSION['genre'] = "すべて";
header('Location:07_ジャンル別投稿一覧画面.php');
?>