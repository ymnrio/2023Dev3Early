<?php
$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
$sql = "SELECT * FROM post WHERE post_contents = ?";
$ps = $pdo->prepare($sql)
?>