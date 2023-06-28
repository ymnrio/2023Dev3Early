<?php
session_start();
$date=date('Y-m-d H:i:s');
$zero=0;

$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');

$sql = "SELECT * FROM reply ORDER BY date_time DESC LIMIT 1";


$sql ="INSERT into reply(reply_id, reply_subject, post_id, reply_contents, date_time, fabulous, comments, media1)
        value(?,?,?,?,?,?,?,?,?,?)";
$ps = $pdo->prepare($sql); 
$ps->bindValue(1,/* 投稿と区別できる返信IDを付与 */,PDO::PARAM_STR);//返信ID
$ps->bindValue(2,/* 返信対象とした投稿または返信ID */,PDO::PARAM_STR);//返信対象ID
$ps->bindValue(3,$_SESSION['user']['id'],PDO::PARAM_STR);//ユーザーID
$ps->bindValue(4,$_POST['genre'],PDO::PARAM_STR);//ジャンル
$ps->bindValue(5,$_POST['text'],PDO::PARAM_STR);//投稿内容
$ps->bindValue(6,$date,PDO::PARAM_STR);//日時
$ps->bindValue(7,$zero,PDO::PARAM_STR);//いいね数
$ps->bindValue(8,$zero,PDO::PARAM_STR);//コメント数
$ps->bindValue(9,$_FILES['file']['name'],PDO::PARAM_STR);//メディア1
$ps->execute();

//動画ファイルと画像だけ選ぶことができるようにする
//ファイル関係の処理を追加する
//動画は時間指定があるか

$_SESSION['subject_id']

//返信した投稿または返信投稿のコメント数を更新
$sql3 = "UPDATE  "


header('01_トップ画面.php');//modorimasu
?>