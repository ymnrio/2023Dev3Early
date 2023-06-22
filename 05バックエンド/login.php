<?php
$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
$sql="SELECT*FROM user WHERE email_address=?";
$ps=$pdo->prepare($sql);
$ps->bindValue(1,$_POST['email'],PDO::PARAM_STR);
$ps->execute();

foreach($ps as $row){
    if(password_verify($_POST['password'], $row['password'])  ==  true){
        header('Location:07_ジャンル別投稿一覧画面.php');
    }else{
        header('Location:02_ログイン画面.php');
    }
}
?>