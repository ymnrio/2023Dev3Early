<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>やまったー | 検索結果表示画面</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--<link href="css/nakai.css" rel="stylesheet" type="text/css">-->
  <link href="css/yamane.css" rel="stylesheet" type="text/css">
  <link href="css/yamanishi.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
  <style>
.material-symbols-outlined {
  font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 48;font-size: 40px;
}
</style>

<body>
  <div class="container-fluid">
    <div class="row magin-10_ys">
      <div class="col-md-3 col-lg-3 start_0_ys"><br>
        <div class="log_yr">
          <img src="img/やまったーlog.png" style="margin-left: -40px; margin-top: -75px;">
        </div>
        <div class="example2" style="position: fixed; margin-top: 115px;">
          <hr class="color_yamani">
          <form action="07_ジャンル別投稿一覧画面.php" method="post">
            <input type="submit" id="1" name="example3" value="すべて"><label for="1">　♪ すべて</label>
            <input type="submit" id="2" name="example3" value="JPOP"><label for="2">　♪ JPOP</label>
            <input type="submit" id="3" name="example3" value="洋楽"><label for="3">　♪ 洋楽</label>
            <input type="submit" id="4" name="example3" value="アニソン"><label for="4">　♪ アニソン</label>
            <input type="submit" id="5" name="example3" value="クラシック"><label for="5">　♪ クラシック</label>
            <input type="submit" id="6" name="example3" value="ロック"><label for="6">　♪ ロック</label>
            <input type="submit" id="7" name="example3" value="VOCALOID"><label for="7">　♪ VOCALOID</label>
            <input type="submit" id="8" name="example3" value="ギター"><label for="8">　♪ ギター</label>
            <input type="submit" id="9" name="example3" value="楽器"><label for="9">　♪ 楽器</label>
            <input type="submit" id="10" name="example3" value="その他"><label style="margin-bottom: -10px;" for="10">　♪ その他</label><br>
          </form>

          <hr class="start_0_ys color_yamani"><br>
          <input type="radio" id="11" name="example3" onclick="location.href='05_プロフィール画面.php'" value="遷移"><label class="nabi_ys" style="margin-bottom: 5px;" for="11">　プロフィール</gita-></label>
          <hr class="start_0_ys color_yamani"><br>
          <input type="radio" id="12" name="example3" onclick="location.href='logout.php.php'" value="遷移"><label class="nabi_ys" for="12">　ログアウト</gita-></label>
        </div>
      </div>
      <!--<div class="col-md-9 col-lg-9/8">-->

      <div class="col-md-9 col-lg-9/8 start_0_ys back_pink_ys" style="height:100vh;">
        <!--<div class="row yoko_ys">
        <div class="col-md-12 start_0_ys"style="height: 100vh;">-->
        <hr class="start_0_ys">
        <div id="toukou" class="area">
          <div class="waku_ys">
            <div class="haikei_yp">
              <div class="padding30_ys"><br><br> 
                <h4>
                  <button type="button" class="btn container-fluid  magin30_yamanisi color_white_yamani border border-light syousai_do_ys" style="margin-left: -10px; margin-top: -10px; width: 150px; " onclick="location.href='07_ジャンル別投稿一覧画面.php'">戻る</button>
                  <div style="text-align: center;margin-top:-30px;">
                <?php echo '"'.$_POST['keyword'].'"の検索結果'.'</h4>'?>

                <?php
                $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
                $sql = "select * from user where user_name LIKE ?";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1, '%' . $_POST['keyword'] . '%', PDO::PARAM_STR);
                $ps->execute();
               foreach($ps as $row){
                $name = $row['user_name'];
                $aikon = $row['media'];
                $user_id = $row['user_id'];

                echo  '<div class="p_ys">';

                    //アイコン表示
                    if (!empty($aikon) || isset($aikon)) { //設定している場合

                      $base64_image = base64_encode($aikon);

                      echo  '<img class="image_middle" width="250"src="data:image/jpeg;base64,' .  $base64_image . '" />　';

                    } else { //設定してない場合
                      echo '<img class="image_middle" src="img/pink.png">　';
                    }

                    echo   $name ;
                    //他人のプロフィールに遷移
                    echo'<form action="13_他人プロフィール.php" method="post">'.
                        '<button name="user_id" type="hidden" value="'.$user_id.'" style="height:0px; text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none; text-align:right;position: relative;top: -65px;left: 775px;">
                        <span class="material-symbols-outlined">face</span></a>
                        </button>
                        </form> 
                    </div>';
               };
?>
              <div style="margin-bottom:50px"></div>
<?php //投稿
                $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
                $sql = "select * from post where post_contents LIKE ? order by post_id desc";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1, '%' . $_POST['keyword']. '%', PDO::PARAM_STR);
                $ps->execute();
                foreach ($ps as $row) {
                  $sql1 = "select * from user where user_id = ? ";
                  $ps1 = $pdo->prepare($sql1);
                  $ps1->bindValue(1, $row['user_id'], PDO::PARAM_INT);
                  $ps1->execute();
                  $name = null;
                  foreach ($ps1 as $row1) {
                    $name = $row1['user_name'];
                    $aikon = $row1['media'];
                    $user_id = $row1['user_id'];
                  }
                  echo  '<div class="p_ys">';

                  //アイコン表示
                  if (!empty($aikon) || isset($aikon)) { //設定している場合

                    $base64_image = base64_encode($aikon);

                    echo  '<img class="image_middle" width="250"src="data:image/jpeg;base64,' .  $base64_image . '" />　';

                  } else { //設定してない場合
                    echo '<img class="image_middle" src="img/pink.png">　';
                  }

                  echo   $name;
                  //ジャンル表示
                  $sql1 = "SELECT genre_name from genre where genre_id = ?";
                      $ps1 = $pdo->prepare($sql1);
                      $ps1->bindValue(1, $row['genre_id'], PDO::PARAM_INT);
                      $ps1->execute();
                      foreach($ps1 as $row1){
                        $genre_name = $row1['genre_name'];
                      }
                      echo '<span class="border border-#FBA8B8 badge text-bg-white color_yamani"style="margin-left:10px; ">'. $genre_name . '</span>  ';

                //他人のプロフィールに遷移
echo             '<form action="13_他人プロフィール.php" method="post">'.
                  '<button name="user_id" type="hidden" value="'.$user_id.'" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none; text-align:right;position: relative;top: -65px;left: 775px;">
                    <span class="material-symbols-outlined">face</span></a>
                  </button>
                </form>';
echo                '<form action="08_投稿詳細画面.php" method="post">'.
                  '<button name="detail" type="hidden" value="'.$row['post_id'].'" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none; width: 870px; text-align:left;">'.
                  '<div style="font-size: 20px;">';
                  echo nl2br($row['post_contents']);

                  //画像があるか検索

                  $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
                  $sql2 = "select * from post where post_id = ?";
                  $ps2 = $pdo->prepare($sql2);
                  $ps2->bindValue(1, $row['post_id'], PDO::PARAM_INT);
                  $ps2->execute();
                  $row2 = $ps2->fetch(PDO::FETCH_ASSOC);

                  if (!empty($row2['media1'])) {
                    $image_data = $row2['media1'];

                    $base64_image = base64_encode($image_data);

                    echo '<br>' . '<img width="250"src="data:image/jpeg;base64,' .  $base64_image . '" /><br>';
                  }

                  echo  '</div>' .
                    '</buton>'.
                    '<div class="row">' .
                    '<div class="col-md-9 col-lg-9 start_0_ys"><p style="margin-top:20px;color:#FBA8B8;padding-left:15px;">'.$row['date_time'].'</p></div>' .
                    '<div class="col-md-1 col-lg-1 start_0_ys">';
                  $like = "like" . $row['post_id'];
                  echo '<input type="checkbox" id="' . $like . '">' .

                    '<label for="' . $like . '">' .
                    '<!--<div class="lavel_like">-->' .
                    '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">' .
                    '<path
                      d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />' .
                    '</svg>　' . $row['fabulous'] . '　　　' .
                    '</label><!--終了ラベルタグ最初はコメントの場所も指定していたけどいいねのところだけ囲った-->' .
                    '</div>' .
                    '</form>'.
                    '<div class="col-md-2 col-lg-2 start_0_ys">
                    <a href="09_投稿返信画面.php" style="text-decoration: none;">
                    <img style="margin-left: 50px;" src="icon/コメント.svg">
                    </a>
                    <div class="" style=" position: relative;bottom: 43px;left: 100px;">
                    　' . $row['comments'] .
                    '</div>
                     </div>
                    </div>
                    </div>';
                    }
?>

                  <div class="box">
                    <button type="button" class="btn container-fluid color_white_yamani border border-dark" style=" width: 65px;height: 65px;background: #FBA8B8;border-radius: 50%;" onclick="location.href='10_新規投稿作成画面.php'">＋</button>
                  </div>
                  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">

                  <div id="page_top">
                    <a href="#"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="sprict/yamanishi.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>