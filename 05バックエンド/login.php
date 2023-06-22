<?php

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
$sql="SELECT*FROM user WHERE email_address=? AND password = ?";
$ps=$pdo->prepare($sql);
$ps->bindValue(1,$_POST['email'],PDO::PARAM_STR);
$ps->bindValue(2,$_POST['password'],PDO::PARAM_STR);
$ps->execute();
$searchArray = $ps->fetchAll();
foreach($searchArray as $row){
    $_SESSION['user']=['id' => $row['user_id'], 'name' => $row['user_name'], 'mail' => $row['email_address'], 'password' => $row['password'],
                       'media' => $row['media'], 'introduction' => $row['introduction']];

    header('Location:07_ジャンル別投稿一覧画面.php');
}
if(count($searchArray) == 0){
    header('Location:02_ログイン画面.php');
}
?>