<?php

session_start();

$pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417495-yamatterdb;charset=utf8', 'LAA1417495', 'SOTA1140');
$sql = "SELECT*,count(*) FROM user WHERE email_address=?";
$ps = $pdo->prepare($sql);
$ps->bindValue(1, $_POST['email'], PDO::PARAM_STR);
$ps->execute();
$searchArray = $ps->fetchAll();

foreach ($searchArray as $row) {
    if($row['count(*)'] == 0){
        header('Location:02_ログイン画面.php');
        $_SESSION['error'] = "メールアドレスまたはパスワードが一致しません。";
        break;
    }
    if (password_verify($_POST['password'], $row['password'])) {
        $_SESSION['user'] = ['id' => $row['user_id'], 'name' => $row['user_name'], 'mail' => $row['email_address'], 'password' => $row['password'],
                             'iconmedia' => $row['media'], 'introduction' => $row['self_introduction']];
        $_SESSION['genre'] = "すべて";
        header('Location:07_ジャンル別投稿一覧画面.php');

    }else{       
        $_SESSION['error'] = "メールアドレスまたはパスワードが一致しません。";
            header('Location:02_ログイン画面.php') ;
        }
    }
?>