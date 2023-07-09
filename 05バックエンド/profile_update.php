<?php

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');

if (!empty($_FILES['file']['name'])) {
    $file = $_FILES['file'];

    $filename = $file['name'];
    $filetype = $file['type'];
    $filedata = file_get_contents($file['tmp_name']);

    $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
    $sql ="UPDATE user SET user_name=?, media=?, self_introduction=? WHERE user_id=?";
    $ps=$pdo->prepare($sql);
    $ps->bindValue(1,$_POST['username'],PDO::PARAM_STR);
    $ps->bindValue(2,$filedata,PDO::PARAM_LOB);
    $ps->bindValue(3,$_POST['introduction'],PDO::PARAM_STR);
    $ps->bindValue(4,$_SESSION['user']['id'],PDO::PARAM_INT);
    $ps->execute();
    }else{ //ないばあい
        $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
        $sql ="update user set user_name=? ,self_introduction=? where user_id = ?";
        $ps=$pdo->prepare($sql);
        $ps->bindValue(1,$_POST['username'],PDO::PARAM_STR);
        $ps->bindValue(2,$_POST['introduction'],PDO::PARAM_STR);
        $ps->bindValue(3,$_SESSION['user']['id'],PDO::PARAM_STR);
        $ps->execute();
    }

    $sql ="SELECT count(*) FROM favorite_genre WHERE user_id=?";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_INT);
    $ps->execute();
    foreach($ps as $row){
        if($row['count(*)'] != 0){ //0以外なら好きなジャンルを消す
            $sql = "DELETE FROM favorite_genre WHERE user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$_SESSION['user']['id'], PDO::PARAM_INT);
            $ps->execute();
        }

    $genre_name;
    if(isset($_POST['example2'])){  //ジャンル選択したか確認
        foreach($_POST['example2'] as $row){    //好きなジャンルを再設定
            $sql="SELECT genre_name FROM genre WHERE genre_id = ?";
            $ps=$pdo->prepare($sql);
            $ps->bindValue(1,$row,PDO::PARAM_INT);
            $ps->execute();

            foreach($ps as $name){
                $genre_name = $name['genre_name'];
            }

            $sql="INSERT INTO favorite_genre(user_id,genre_id,genre_name)VALUES(?,?,?)";
            $ps=$pdo->prepare($sql);
            $ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_INT);
            $ps->bindValue(2,$row,PDO::PARAM_INT);
            $ps->bindValue(3,$genre_name,PDO::PARAM_STR);
            $ps->execute();
        }
    }
}

    $sql ="SELECT * FROM user WHERE user_id=?"; //せションの再設定
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_INT);
    $ps->execute();
    foreach($ps as $row){
        $_SESSION['user'] = ['id' => $row['user_id'], 'name' => $row['user_name'], 'mail' => $row['email_address'], 'password' => $row['password'],
                             'iconmedia' => $row['media'], 'introduction' => $row['self_introduction']];
    }

/*    $sql = "SELECT genre_id FROM favorite_genre WHERE user_id";//好きなジャンルを光らせる
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_INT);
    $ps->execute();
    foreach($ps as $row){
        $favoriteArr = $row['genre_id'];
    }

    for($i=1; $i<11; $i++){
        if(in_array($row,$favoriteArr)){
         //   echo ;
        }
    }
*/
header('Location:05_プロフィール画面.php');
?>