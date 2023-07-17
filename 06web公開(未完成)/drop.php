<?php
session_start();
if(!empty($_POST['drop'])){

    $id = $_POST['drop'];
    echo $id;

    $pdo = new PDO('mysql:host=mysql215.phy.lolipop.lan;dbname=LAA1417495-yamattertest;charset=utf8', 'LAA1417495', 'sotA1140');
    $a = substr($id,0,2);
    if($a != "00"){
        $sql = "DELETE FROM post WHERE post_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $id, PDO::PARAM_STR);
        $ps->execute();
        unset($_SESSION['trash']);
        header('Location:05_プロフィール画面.php');
    }else{
        $sql = "DELETE FROM reply WHERE reply_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $id, PDO::PARAM_STR);
        $ps->execute();
        unset($_SESSION['trash']);
        header('Location:05_プロフィール画面.php');
    }

}else{

unset($_SESSION['trash']);
header('Location:05_プロフィール画面.php');

}
?>