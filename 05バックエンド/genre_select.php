<?
$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
$sql = "SELECT * FROM genre";
$ps=$pdo->prepare($sql);

$ps->execute();
$s_genre



?>