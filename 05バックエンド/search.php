<?php
$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
$sql = "SELECT * FROM post WHERE post_contents = ? OR user_name";
$ps = $pdo->prepare($sql);
$ps->bindValue(1,$POST['post_contents'],PDO::PARAM_STR);

$ps->execute();
?>