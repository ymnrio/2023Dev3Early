<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
$a=46;
$sql = "select media1 from post where post_id = ?";
$ps=$pdo->prepare($sql);
    $ps->bindValue(1,$a,PDO::PARAM_INT);
    $ps->execute();
    foreach($ps as $row){
        $image_data = $row['media1'];

        $base64_image = base64_encode($image_data);
        echo '<video width="300"height="250"src="data:video/mp4;base64,'.$base64_image.'"controls></video>';
    }
?>

