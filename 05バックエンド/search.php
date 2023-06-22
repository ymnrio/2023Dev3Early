<?php
$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
$sql = "SELECT post.post_id, post.user_id, post.genre_id, post.post_contents, post.date_time, post.fabulous, post.comments, post.media1, post.media2, user.user_name, user.email_address, user.password FROM post INNER JOIN user ON post.user_id = user.user_id WHERE post.post_contents LIKE ? OR user.user_name LIKE ?";
$ps = $pdo->prepare($sql);
$ps->bindValue(1,"%".$_POST['keyword']."%",PDO::PARAM_STR);
$ps->bindValue(2,"%".$_POST['keyword']."%",PDO::PARAM_STR);


$ps->execute();

echo "$_POST[keyword]の検索結果<br>";

header('Location:11_検索結果表示画面.php');
?>