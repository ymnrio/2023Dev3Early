<?php
session_start();

if(isset($_SESSION['user']['id'])){
    header('Location:07_ジャンル別投稿一覧画面.php');
}else{
    header('Location:02_ログイン画面.php');
}
?>