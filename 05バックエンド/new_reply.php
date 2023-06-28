<?php
session_start();
$date=date('Y-m-d H:i:s');
$zero=0;

$media = array(); 
if(isset($_FILES['file']['name']) && is_array($_FILES['file']['name'])) {
    foreach($_FILES['file']['name'] as $row) {
        $media[] = $row;
    }
}
/*
for($i = 0;$i <= 2; $i++){
        $media[$i] = $_FILES['file']['name'][$i];
}


$media = array(); 
if(isset($_FILES['file']['name'])){
        foreach($_FILES['file']['name'] as $row){
             $media[$i] = $row;  
             $i += $i + 1;
        }
}



	foreach ($_FILES['file']['tmp_name'] as $no => $tmp_name) {
		//ファイルをテンポラリから保存場所へ移動（但し本来は渡されたファイル名をそのまま使うのは危険）
		$filename = './'.$_FILES['file']['name'][$no];
		if (move_uploaded_file($tmp_name, $filename)) {
			echo $_FILES['file']['name'][$no].'をアップロードしました<br>';
		} else {
			//エラー処理
		}
	}
*/


$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
$sql ="INSERT into reply(reply_id, reply_subject, post_id, reply_contents, date_time, fabulous, comments, media1, media2)
        value(?,?,?,?,?,?,?,?,?,?)";
$ps = $pdo->prepare($sql); 
$ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_STR);//ユーザーID
$ps->bindValue(2,$_POST['genre'],PDO::PARAM_STR);//ジャンル
$ps->bindValue(3,$_POST['text'],PDO::PARAM_STR);//投稿内容
$ps->bindValue(4,$date,PDO::PARAM_STR);//日時
$ps->bindValue(5,$zero,PDO::PARAM_STR);//いいね数
$ps->bindValue(6,$zero,PDO::PARAM_STR);//コメント数
$ps->bindValue(7,$media[0],PDO::PARAM_STR);//メディア1
$ps->bindValue(8,$media[1],PDO::PARAM_STR);//メディア2
$ps->execute();

header('01_トップ画面.php');//modorimasu


//動画ファイルと画像だけ選ぶことができるようにする
//ファイル関係の処理を追加する
//動画は時間指定があるか


/*
session_start();
$date = date('Y-m-d H:i:s');
$zero = 0;

$media = array(); 
if(isset($_FILES['file']['name']) && is_array($_FILES['file']['name'])) {
    $totalFiles = count($_FILES['file']['name']);
    for ($i = 0; $i < $totalFiles; $i++) {
        $tempFilePath = $_FILES['file']['tmp_name'][$i];
        $media[] = uploadFile($tempFilePath); // ファイルをアップロードしてファイル名を配列に追加
    }
}

$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8','root','root');
$sql = "INSERT INTO post (user_id, genre_id, post_contents, date_time, fabulous, comments, media1, media2)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$ps = $pdo->prepare($sql); 
$ps->bindValue(1, $_SESSION['user_id'], PDO::PARAM_STR); // ユーザーID
$ps->bindValue(2, $_POST['genre'], PDO::PARAM_STR); // ジャンル
$ps->bindValue(3, $_POST['text'], PDO::PARAM_STR); // 投稿内容
$ps->bindValue(4, $date, PDO::PARAM_STR); // 日時
$ps->bindValue(5, $zero, PDO::PARAM_INT); // いいね数（整数としてバインド）
$ps->bindValue(6, $zero, PDO::PARAM_INT); // コメント数（整数としてバインド）
$ps->bindValue(7, isset($media[0]) ? $media[0] : null, PDO::PARAM_STR); // メディア1（存在しない場合はnullとしてバインド）
$ps->bindValue(8, isset($media[1]) ? $media[1] : null, PDO::PARAM_STR); // メディア2（存在しない場合はnullとしてバインド）
$ps->execute();

header('Location: 01_トップ画面.php'); // リダイレクトのURLを修正
exit(); // スクリプトの実行を終了

function uploadFile($tempFilePath) {
    $targetDir = 'uploads/'; // 保存先のディレクトリパスを設定
    $fileName = uniqid() . '_' . basename($tempFilePath); // ユニークなファイル名を生成
    $targetPath = $targetDir . $fileName; // ファイルの保存先パス

    if (move_uploaded_file($tempFilePath, $targetPath)) { // ファイルを移動
        return $fileName; // ファイル名を返す
    } else {
        return null; // アップロードに失敗した場合はnullを返す
    }
}
*/
?>
