<?php
session_start();
$date=date('Y-m-d H:i:s');
$zero=0;

$fileName = $_FILES['file']['name'];
$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
$sql ="INSERT into post(user_id,genre_id,post_contents,date_time,fabulous,comments,media1)
        value(?,?,?,?,?,?,?)"; //？を一個減らしてます。メディアを2個登録したいなら増やしてね
$ps = $pdo->prepare($sql); 
$ps->bindValue(1,$_SESSION['user_id'],PDO::PARAM_STR);//ユーザーID
$ps->bindValue(2,$_POST['genre'],PDO::PARAM_STR);//ジャンル
$ps->bindValue(3,$_POST['text'],PDO::PARAM_STR);//投稿内容
$ps->bindValue(4,$date,PDO::PARAM_STR);//日時
$ps->bindValue(5,$zero,PDO::PARAM_STR);//いいね数
$ps->bindValue(6,$zero,PDO::PARAM_STR);//コメント数
$ps->bindValue(7,$fileName,PDO::PARAM_STR);//メディア1
//$ps->bindValue(8,,PDO::PARAM_STR);//メディア2
$ps->execute();

header('Location:07_ジャンル別投稿一覧画面.php');//modorimasu

?>
