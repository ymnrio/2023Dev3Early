<?php 
//13に遷移する前に該当するユーザーIDを保存
session_start();
if(isset($_POST['user_id'])){
$_SESSION['move_user_id'] = $_POST['user_id'];
header('Location:13_他人プロフィール.php') ;
};

if(isset($_POST['detail'])){
$_SESSION['post_id'] = $_POST['detail'];
header('Location:08_投稿詳細画面.php') ;
};
?>