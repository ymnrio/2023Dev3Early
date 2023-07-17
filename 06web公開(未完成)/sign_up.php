<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

$name_number = mb_strlen($name, 'UTF-8');
if($name_number >10){
    $_SESSION['error'] = "ユーザーネームは10文字未満までです。";
    header('Location:03_新規登録画面.php');
}
$pdo = new PDO('mysql:host=mysql215.phy.lolipop.lan;dbname=LAA1417495-yamattertest;charset=utf8', 'LAA1417495', 'sotA1140');

//メールアドレス重複確認
$sql="select count(*) from user group by email_address having email_address = ?";
$ps=$pdo->prepare($sql);
$ps->bindValue(1,$email,PDO::PARAM_STR);
$ps->execute();
foreach($ps as $row){
    $count = $row['count(*)'];

}


//＄countの中に数値が入っているか確認
    if(isset($count)){
        $_SESSION['error'] = "このメールアドレスはすでに使用されています。";
        header('Location:03_新規登録画面.php');  
    }else{
      
        
//データベースに垢情報を登録
$sql="INSERT INTO user(email_address,password,user_name)VALUES(?,?,?)";
$ps=$pdo->prepare($sql);
$ps->bindValue(1,$email,PDO::PARAM_STR);
$ps->bindValue(2,password_hash($password,PASSWORD_DEFAULT),PDO::PARAM_STR);
$ps->bindValue(3,$name,PDO::PARAM_STR);
$ps->execute();



//セッションにユーザーIDを代入
$sql="select user_id from user where email_address = ?";
$ps=$pdo->prepare($sql);
$ps->bindValue(1,$email,PDO::PARAM_STR);
$ps->execute();
foreach($ps as $row){
    $_SESSION['user_id'] = $row['user_id'];
}

header('Location:04_プロフィール設定画面.php');
    }
    
?>