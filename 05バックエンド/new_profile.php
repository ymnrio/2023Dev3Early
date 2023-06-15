<?php
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8',
'root','root');

$fileName = $_FILES['file']['name'];

$sql="update user set media=?,self_introduction=? where user_id = ?";

$ps=$pdo->prepare($sql);
$ps->bindValue(1,$fileName,PDO::PARAM_STR);
$ps->bindValue(2,$_POST['jikosyoukai'],PDO::PARAM_STR);
$ps->bindValue(3,$_SESSION['user_id'],PDO::PARAM_STR);
$ps->execute();


//好きなジャンルを登録
/*if(isset($_POST['example2'])){
    $interests = $_POST['example2'];
} else {
    $interests = array(); // チェックボックスが選択されていない場合は空の配列を使用する
}


foreach ($interests as $interest) {
    echo $interest;
}*/
$genre_name;
if(isset($_POST['like_genre'])){
    foreach($_POST['like_genre'] as $row){
        
        $sql="select genre_name from genre where genre_id = ?";

        $ps=$pdo->prepare($sql);
        $ps->bindValue(1,$row,PDO::PARAM_STR);
        $ps->execute();

        foreach($ps as $roww){
            $genre_name = $roww['genre_name'];
        }

        $sql="INSERT INTO favorite genre(user_id,genre_id,genre_name)VALUES(?,?,?)";
        $ps=$pdo->prepare($sql);
        $ps->bindValue(1,$_SESSION['user_id'],PDO::PARAM_STR);
        $ps->bindValue(2,$_POST['like_genre'],PDO::PARAM_STR);
        $ps->bindValue(3,$genre_name,PDO::PARAM_STR);
        $ps->execute();

    }//データベース名を変えたい...
}
?>