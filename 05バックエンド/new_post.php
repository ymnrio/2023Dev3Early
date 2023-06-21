<?php
session_start();
$text=$_POST['text'];
$genre=$_POST['genre'];
$date=date('Y-m-d H:i:s');
$zero=0;

$media1 ;
$media2 ;
$row = array(); 
if(isset($_FILES['file']['name'])){
        foreach($_FILES['file']['name'] as $row[]){
                
        }
}


$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','');
$sql ="INSERT into post(user_id,genre_id,post_contents,date_time,fabulous,comments,media1,media2)
        value(?,?,?,?,?,?,?,?)";
$ps = $pdo->prepare($sql); 
$ps->bindValue(1,$_SESSION['user_id'],PDO::PARAM_STR);//ユーザーID
$ps->bindValue(2,$genre,PDO::PARAM_STR);//ジャンル
$ps->bindValue(3,$text,PDO::PARAM_STR);//投稿内容
$ps->bindValue(4,$date,PDO::PARAM_STR);//日時
$ps->bindValue(5,$zero,PDO::PARAM_STR);//いいね数
$ps->bindValue(6,$zero,PDO::PARAM_STR);//コメント数
$ps->bindValue(7,$row[0],PDO::PARAM_STR);//メディア1
$ps->bindValue(8,$row[1],PDO::PARAM_STR);//メディア2
$ps->execute();

header('01_トップ画面.php');//modorimasu


//動画ファイルと画像だけ選ぶことができるようにする
//ファイル関係の処理を追加する
//動画は時間指定があるか
?>