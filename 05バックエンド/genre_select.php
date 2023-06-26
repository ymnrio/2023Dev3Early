<?php

$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
$sql = "SELECT * FROM genre WHERE genre_name = ?";
$ps = $pdo->prepare($sql);
$ps->bindValue(1,$POST['genre_id'],PDO::PARAM_STR);

$ps->execute();

foreach($ps as $row) {
    $row['post_id'];
    $row['user_id'];
    $row['genre_id'];
    $row['post_content'];
}

header('Location:07_ジャンル別投稿一覧画面.php');
?>