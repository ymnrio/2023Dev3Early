<?php
$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
$sql = "SELECT * FROM post WHERE post_contents = ? OR user_name";
$ps = $pdo->prepare($sql);
$ps->bindValue(1,$POST['post_contents'],PDO::PARAM_STR);

$ps->execute();

echo "$_POST[keyword]の検索結果<br>";
foreach($ps->fetchAll() as $row) {
    echo "$row[post_contents]:$row[]"
}

?>