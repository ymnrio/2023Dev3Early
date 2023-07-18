<?php
session_start();
if(!empty($_POST['drop'])){

    $id = $_POST['drop'];
    echo $id;

    $pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417495-yamatterdb;charset=utf8', 'LAA1417495', 'SOTA1140');
    $a = substr($id,0,2);
    if($a != "00"){
        $sql = "DELETE FROM post WHERE post_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $id, PDO::PARAM_STR);
        $ps->execute();
        unset($_SESSION['trash']);
        header('Location:05_プロフィール画面.php');
    }else{
        //返信の場合コメント数を更新
        $sql = "SELECT reply_id, reply_subject, user_id, reply_contents, date_time, fabulous, comments, media1, media2
                FROM reply WHERE reply_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $id, PDO::PARAM_STR);
        $ps->execute();
        foreach ($ps as $row) {
            $b = substr($row['reply_subject'],0,2);
            if($b != "00"){//返信元が投稿の場合
                //返信元投稿のコメントから1引いたコメント数を取得
                $sql2 = "SELECT * FROM post WHERE post_id = ?";
                $ps2 = $pdo->prepare($sql2);
                $ps2->bindValue(1, $row['reply_subject'], PDO::PARAM_STR);
                $ps2->execute();
                foreach ($ps2 as $row2) {
                    $comments = $row2['comments'] - 1;
                }

                //取得したコメント数をDBに更新
                $sql3 = "UPDATE post SET comments = ? WHERE post_id = ?";
                $ps3 = $pdo->prepare($sql3);
                $ps3->bindValue(1, $comments, PDO::PARAM_INT);
                $ps3->bindValue(2, $row['reply_subject'], PDO::PARAM_INT);
                $ps3->execute();
            }else{//返信元が返信の場合
                //返信元返信のコメントから1引いたコメント数を取得
                $sql2 = "SELECT * FROM reply WHERE reply_id = ?";
                $ps2 = $pdo->prepare($sql2);
                $ps2->bindValue(1, $row['reply_subject'], PDO::PARAM_STR);
                $ps2->execute();
                foreach ($ps2 as $row2) {
                    $comments = $row2['comments'] - 1;
                }

                //取得したコメント数をDBに更新
                $sql3 = "UPDATE reply SET comments = ? WHERE reply_id = ?";
                $ps3 = $pdo->prepare($sql3);
                $ps3->bindValue(1, $comments, PDO::PARAM_INT);
                $ps3->bindValue(2, $row['reply_subject'], PDO::PARAM_INT);
                $ps3->execute();
            }
        }

        //replyテーブから返信投稿を削除
        $sql = "DELETE FROM reply WHERE reply_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $id, PDO::PARAM_STR);
        $ps->execute();
        unset($_SESSION['trash']);

            /*$sql = "SELECT reply.reply_id, reply.reply_subject, reply.user_id, reply.reply_contents, reply.date_time, reply.fabulous, reply.comments, reply.media1, reply.media2,
                    user.user_id, user.user_name, user.email_address, user.password, user.media, user.self_introduction
                    FROM reply INNER JOIN user ON reply.user_id = user.user_id WHERE reply = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $_POST['drop'], PDO::PARAM_STR);
            $ps->execute();
            foreach ($ps as $row) {

            }*/
        header('Location:05_プロフィール画面.php');

    }

}else{

unset($_SESSION['trash']);
header('Location:05_プロフィール画面.php');

}
?>