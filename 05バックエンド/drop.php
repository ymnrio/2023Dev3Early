<?php
session_start();
if(!empty($_POST['drop'])){

$id = $_POST['drop'];
echo $id;

$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
$sql = "DELETE FROM post WHERE post_id = ?";
$ps = $pdo->prepare($sql);
$ps->bindValue(1, $id, PDO::PARAM_STR);
$ps->execute();
unset($_SESSION['trash']);
header('Location:05_プロフィール画面.php');

}else{

unset($_SESSION['trash']);
header('Location:05_プロフィール画面.php');

}
?>