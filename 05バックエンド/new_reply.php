<?php

session_start();

$date=date('Y-m-d H:i:s');
$zero=0;
$reply_id = "001";

//reply_idを設定
$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
$sql = "SELECT *, count(*) FROM reply WHERE date_time = (SELECT Max(date_time) FROM reply)";
$ps = $pdo->prepare($sql);
$ps->execute();
foreach($ps as $row){
        $idnum = $row['reply_id'];
        $idnum = substr($idnum,2);
        $idnum = (int)$idnum;
        $idnum = $idnum + 1;
        $reply_id = "00{$idnum}";
    }


//画像があるか確認
if (!empty($_FILES['file']['name'])) {
        $file = $_FILES['file'];
        
        $filename = $file['name'];
        $filetype = $file['type'];
        $filedata = file_get_contents($file['tmp_name']);

        $sql ="INSERT into reply(reply_id, reply_subject, user_id, reply_contents, date_time,fabulous, comments, media1)
                value(?,?,?,?,?,?,?,?)";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$reply_id,PDO::PARAM_STR);//返信ID
        $ps->bindValue(2,$_POST['reply'],PDO::PARAM_STR);//返信元ID
        $ps->bindValue(3,$_SESSION['user']['id'],PDO::PARAM_STR);//ユーザーID
        $ps->bindValue(4,$_POST['replyctt'],PDO::PARAM_STR);//返信内容
        $ps->bindValue(5,$date,PDO::PARAM_STR);//日時
        $ps->bindValue(6,$zero,PDO::PARAM_STR);//いいね数
        $ps->bindValue(7,$zero,PDO::PARAM_STR);//コメント数
        $ps->bindValue(8,$filedata,PDO::PARAM_LOB);//メディア1
        $ps->execute();
        }else{ //ないばあい
        $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
        $sql ="INSERT into post(reply_id, reply_subject, user_id, reply_contents, date_time, fabulous, comments)
                value(?,?,?,?,?,?,?)";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$reply_id,PDO::PARAM_STR);//返信ID
        $ps->bindValue(2,$_POST['reply'],PDO::PARAM_STR);//返信元ID
        $ps->bindValue(3,$_SESSION['user']['id'],PDO::PARAM_STR);//ユーザーID
        $ps->bindValue(4,$_POST['replyctt'],PDO::PARAM_STR);//返信内容
        $ps->bindValue(5,$date,PDO::PARAM_STR);//日時
        $ps->bindValue(6,$zero,PDO::PARAM_STR);//いいね数
        $ps->bindValue(7,$zero,PDO::PARAM_STR);//コメント数
        $ps->execute();    
}

//返信した投稿または返信投稿のコメント数を更新
$a = substr($_POST['reply'],0,2);
if($a == "00"){
        $sql = "SELECT comments FROM reply WHERE reply_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$_POST['reply'],PDO::PARAM_STR);
        $ps->execute();
        foreach($ps as $row){
                $newcomments = $row['comments'] + 1;
        }

        $sql = "UPDATE reply SET comments = ? WHERE reply_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$newcomments,PDO::PARAM_INT);
        $ps->bindValue(2,$_POST['reply'],PDO::PARAM_STR);
        $ps->execute();

}else{
        $sql = "SELECT comments FROM post WHERE post_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$_POST['reply'],PDO::PARAM_STR);
        $ps->execute();
        foreach($ps as $row){
                $newcomments = $row['comments'] + 1;
        }

        $sql = "UPDATE post SET comments = ? WHERE post_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$newcomments,PDO::PARAM_INT);
        $ps->bindValue(2,$_POST['reply'],PDO::PARAM_STR);
        $ps->execute();
}


//動画ファイルと画像だけ選ぶことができるようにする
//ファイル関係の処理を追加する
//動画は時間指定があるか

//header('01_トップ画面.php');//遷移先？
?>