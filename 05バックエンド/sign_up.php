<?php
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8',
'root','root');

//メールアドレス重複確認

$sql="select count(*) from user group by email_address having email_address = ?";
$ps=$pdo->prepare($sql);
$ps->bindValue(1,$_POST['email'],PDO::PARAM_STR);
$ps->execute();
foreach($ps as $row){
    $count = $row['count(*)'];

}


//＄countの中に数値が入っているか確認
    if((isset($count))){
        header('Location:03_新規登録画面.php');  
    }else{
      
        
//データベースに垢情報を登録
$sql="INSERT INTO user(email_address,password,user_name)VALUES(?,?,?)";
$ps=$pdo->prepare($sql);
$ps->bindValue(1,$_POST['email'],PDO::PARAM_STR);
$ps->bindValue(2,password_hash($_POST['password'],PASSWORD_DEFAULT),PDO::PARAM_STR);
$ps->bindValue(3,$_POST['new_password'],PDO::PARAM_STR);
$ps->execute();



//セッションにユーザーIDを代入
$sql="select user_id from user where email_address = ?";
$ps=$pdo->prepare($sql);
$ps->bindValue(1,$_POST['email'],PDO::PARAM_STR);
$ps->execute();
foreach($ps as $row){
    $_SESSION['user_id'] = $row['user_id'];
 
}
    }
    header('Location:04_プロフィール設定画面.php');
?>