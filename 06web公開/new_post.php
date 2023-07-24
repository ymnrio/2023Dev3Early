<?php

session_start();

$date=date('Y-m-d H:i:s');
$zero=0;

$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
if($_FILES['file']['size'] >= 10485760){ //10M以上だったらエラーを表示する
        $_SESSION['error'] = "ファイルのサイズがオーバーしています。アップできる容量は10Mまでです。";
        header('Location:10_新規投稿作成画面.php');
}

if (!empty($_FILES['file']['name'])) {//画像または動画がある場合
        $file = $_FILES['file'];

        $filename = $file['name'];
        $filetype = $file['type'];
        $filedata = file_get_contents($file['tmp_name']);

                if($extension == "MP4" || $extension == "mp4"){ //拡張子がmp4、MP4
                        //mp4
                       $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
                        $sql ="INSERT into post(user_id,genre_id,post_contents,date_time,fabulous,comments,media1,media2)
                                value(?,?,?,?,?,?,?,?)";
                        $ps = $pdo->prepare($sql);
                        $ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_STR);//ユーザーID
                        $ps->bindValue(2,$_POST['genre'],PDO::PARAM_STR);//ジャンル
                        $ps->bindValue(3,$_POST['text'],PDO::PARAM_STR);//投稿内容
                        $ps->bindValue(4,$date,PDO::PARAM_STR);//日時
                        $ps->bindValue(5,$zero,PDO::PARAM_STR);//いいね数
                        $ps->bindValue(6,$zero,PDO::PARAM_STR);//コメント数
                        $ps->bindValue(7,$filedata,PDO::PARAM_LOB);//メディア1
                        $ps->bindValue(8,"2",PDO::PARAM_STR);//動画は2
                        $ps->execute();
                        
                }else{
                        //画像
                        $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
                        $sql ="INSERT into post(user_id,genre_id,post_contents,date_time,fabulous,comments,media1,media2)
                                value(?,?,?,?,?,?,?,?)";
                        $ps = $pdo->prepare($sql);
                        $ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_STR);//ユーザーID
                        $ps->bindValue(2,$_POST['genre'],PDO::PARAM_STR);//ジャンル
                        $ps->bindValue(3,$_POST['text'],PDO::PARAM_STR);//投稿内容
                        $ps->bindValue(4,$date,PDO::PARAM_STR);//日時
                        $ps->bindValue(5,$zero,PDO::PARAM_STR);//いいね数
                        $ps->bindValue(6,$zero,PDO::PARAM_STR);//コメント数
                        $ps->bindValue(7,$filedata,PDO::PARAM_LOB);//メディア1
                        $ps->bindValue(8,"1",PDO::PARAM_STR);//画像は1
                        $ps->execute();
                }
        
        }else{ //何もないばあい
                $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
                $sql ="INSERT into post(user_id,genre_id,post_contents,date_time,fabulous,comments)
                        value(?,?,?,?,?,?)";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_STR);//ユーザーID
                $ps->bindValue(2,$_POST['genre'],PDO::PARAM_STR);//ジャンル
                $ps->bindValue(3,$_POST['text'],PDO::PARAM_STR);//投稿内容
                $ps->bindValue(4,$date,PDO::PARAM_STR);//日時
                $ps->bindValue(5,$zero,PDO::PARAM_STR);//いいね数
                $ps->bindValue(6,$zero,PDO::PARAM_STR);//コメント数
                $ps->execute();
}

header('Location:07_ジャンル別投稿一覧画面.php');//modorimasu

?>