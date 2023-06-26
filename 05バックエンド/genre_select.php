<?
$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
$sql = "SELECT * FROM genre";
$ps=$pdo->prepare($sql);

$ps->bindValue(1, $_POST['post_id'], PDO::PARAM_STR);
$ps->bindValue(2, $_POST['user_id'], PDO::PARAM_STR);
$ps->bindValue(3, $_POST['genre_id'], PDO::PARAM_STR);
$ps->bindValue(4, $_POST['post_contents'], PDO::PARAM_STR);
$ps->bindValue(5, $_POST['fabulous'], PDO::PARAM_STR);
$ps->bindValue(6, $_POST['comments'], PDO::PARAM_STR);
$ps->bindValue(7, $_POST['media1'], PDO::PARAM_STR);
$ps->bindValue(8, $_POST['media2'], PDO::PARAM_STR);

$ps->execute();

foreach($ps as $row) {
    $row['post_id'];
    $row['user_id'];
    $row['genre_id'];
    $row['post_content'];
}
header('Location:07_ジャンル別投稿一覧画面.php');
?>