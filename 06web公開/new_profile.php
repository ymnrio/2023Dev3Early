<?php
session_start();

$pdo = new PDO('mysql:host=mysql217.phy.lolipop.lan;dbname=LAA1417495-yamatter;charset=utf8', 'LAA1417495', 'sotA1140');

if (!empty($_FILES['file']['name'])) {
    $file = $_FILES['file'];
    
    $filename = $file['name'];
    $filetype = $file['type'];
    $filedata = file_get_contents($file['tmp_name']);

    $pdo = new PDO('mysql:host=mysql217.phy.lolipop.lan;dbname=LAA1417495-yamatter;charset=utf8', 'LAA1417495', 'sotA1140');
    $sql ="update user set media=?,self_introduction=? where user_id = ?";
    $ps=$pdo->prepare($sql);
    $ps->bindValue(1,$filedata,PDO::PARAM_LOB);
    $ps->bindValue(2,$_POST['jikosyoukai'],PDO::PARAM_STR);
    $ps->bindValue(3,$_SESSION['user_id'],PDO::PARAM_STR);
    $ps->execute();
    }else{ //ないばあい
        $pdo = new PDO('mysql:host=mysql217.phy.lolipop.lan;dbname=LAA1417495-yamatter;charset=utf8', 'LAA1417495', 'sotA1140');
        $sql ="update user set self_introduction=? where user_id = ?";
        $ps=$pdo->prepare($sql);
        $ps->bindValue(1,$_POST['jikosyoukai'],PDO::PARAM_STR);
        $ps->bindValue(2,$_SESSION['user_id'],PDO::PARAM_STR);
        $ps->execute();
}

//好きなギャンる

$genre_name;
if(isset($_POST['like_genre'])){
    foreach($_POST['like_genre'] as $row){
        $sql="select genre_name from genre where genre_id = ?";

        $ps=$pdo->prepare($sql);
        $ps->bindValue(1,$row,PDO::PARAM_STR);
        $ps->execute();

        foreach($ps as $name){
            $genre_name = $name['genre_name'];
        }

        $sql="INSERT INTO favorite_genre(user_id,genre_id,genre_name)VALUES(?,?,?)";
        $ps=$pdo->prepare($sql);
        $ps->bindValue(1,$_SESSION['user_id'],PDO::PARAM_INT);
        $ps->bindValue(2,$row,PDO::PARAM_INT);
        $ps->bindValue(3,$genre_name,PDO::PARAM_STR);
        $ps->execute();
    }
}
header('Location:profile_session.php');
?>