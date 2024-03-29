<?php

session_start();

$date=date('Y-m-d H:i:s');
$zero=0;
$reply_id = "001";

$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
if($_FILES['file']['size'] >= 10485760){ //10M以上だったらエラーを表示する
        $_SESSION['error'] = "ファイルのサイズがオーバーしています。アップできる容量は10Mまでです。";
        header('Location:10_新規投稿作成画面.php');
}

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


if (!empty($_FILES['file']['name'])) { //画像または動画がある場合
        $file = $_FILES['file'];
        
        $filename = $file['name'];
        $filetype = $file['type'];
        $filedata = file_get_contents($file['tmp_name']);

                if($extension == "MP4" || $extension == "mp4"){
                        //mp4
                        $sql ="INSERT into reply(reply_id, reply_subject, user_id, reply_contents, date_time,fabulous, comments, media1,media2)
                                value(?,?,?,?,?,?,?,?,?)";
                        $ps = $pdo->prepare($sql);
                        $ps->bindValue(1,$reply_id,PDO::PARAM_STR);//返信ID
                        $ps->bindValue(2,$_POST['newreply'],PDO::PARAM_STR);//返信元ID
                        $ps->bindValue(3,$_SESSION['user']['id'],PDO::PARAM_STR);//ユーザーID
                        $ps->bindValue(4,$_POST['replyctt'],PDO::PARAM_STR);//返信内容
                        $ps->bindValue(5,$date,PDO::PARAM_STR);//日時
                        $ps->bindValue(6,$zero,PDO::PARAM_STR);//いいね数
                        $ps->bindValue(7,$zero,PDO::PARAM_STR);//コメント数
                        $ps->bindValue(8,$filedata,PDO::PARAM_LOB);//メディア1
                        $ps->bindValue(9,"2",PDO::PARAM_STR);//動画は2
                        $ps->execute();
                }else{ 
                        //画像
                        $sql ="INSERT into reply(reply_id, reply_subject, user_id, reply_contents, date_time,fabulous, comments, media1,media2)
                                value(?,?,?,?,?,?,?,?,?)";
                        $ps = $pdo->prepare($sql);
                        $ps->bindValue(1,$reply_id,PDO::PARAM_STR);//返信ID
                        $ps->bindValue(2,$_POST['newreply'],PDO::PARAM_STR);//返信元ID
                        $ps->bindValue(3,$_SESSION['user']['id'],PDO::PARAM_STR);//ユーザーID
                        $ps->bindValue(4,$_POST['replyctt'],PDO::PARAM_STR);//返信内容
                        $ps->bindValue(5,$date,PDO::PARAM_STR);//日時
                        $ps->bindValue(6,$zero,PDO::PARAM_STR);//いいね数
                        $ps->bindValue(7,$zero,PDO::PARAM_STR);//コメント数
                        $ps->bindValue(8,$filedata,PDO::PARAM_LOB);//メディア1
                        $ps->bindValue(9,"1",PDO::PARAM_STR);//画像は1
                        $ps->execute();
                }

        }else{ //ないばあい

        $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
        $sql ="INSERT into reply(reply_id, reply_subject, user_id, reply_contents, date_time, fabulous, comments)
                value(?,?,?,?,?,?,?)";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$reply_id,PDO::PARAM_STR);//返信ID
        $ps->bindValue(2,$_POST['newreply'],PDO::PARAM_STR);//返信元ID
        $ps->bindValue(3,$_SESSION['user']['id'],PDO::PARAM_STR);//ユーザーID
        $ps->bindValue(4,$_POST['replyctt'],PDO::PARAM_STR);//返信内容
        $ps->bindValue(5,$date,PDO::PARAM_STR);//日時
        $ps->bindValue(6,$zero,PDO::PARAM_STR);//いいね数
        $ps->bindValue(7,$zero,PDO::PARAM_STR);//コメント数
        $ps->execute();    
        
}

//返信した投稿または返信投稿のコメント数を更新
$a = substr($_POST['newreply'],0,2);
if($a == "00"){
        $sql = "SELECT comments FROM reply WHERE reply_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$_POST['newreply'],PDO::PARAM_STR);
        $ps->execute();
        foreach($ps as $row){
                $newcomments = $row['comments'] + 1;
        }

        $sql = "UPDATE reply SET comments = ? WHERE reply_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$newcomments,PDO::PARAM_INT);
        $ps->bindValue(2,$_POST['newreply'],PDO::PARAM_STR);
        $ps->execute();

}else{
        $sql = "SELECT comments FROM post WHERE post_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$_POST['newreply'],PDO::PARAM_STR);
        $ps->execute();
        foreach($ps as $row){
                $newcomments = $row['comments'] + 1;
        }

        $sql = "UPDATE post SET comments = ? WHERE post_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$newcomments,PDO::PARAM_INT);
        $ps->bindValue(2,$_POST['newreply'],PDO::PARAM_STR);
        $ps->execute();
}

$subjectid = $_POST['newreply'];


//動画ファイルと画像だけ選ぶことができるようにする
//ファイル関係の処理を追加する
//動画は時間指定があるか

header('Location:08_投稿詳細画面.php?hogeA='.$subjectid);//遷移先？
?>