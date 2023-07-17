<?php
session_start();
//unset($_SESSION['genre']);
$_SESSION['genre'] = $_POST['example3'];

  if($_SESSION['genre'] == "プロフィール"){
    header('Location:05_プロフィール画面.php');
  }else{
    header('Location:07_ジャンル別投稿一覧画面.php');
  }
?>