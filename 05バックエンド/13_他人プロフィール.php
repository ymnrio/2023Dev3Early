<?php 
session_start(); 
if(!empty($_POST['user_id'])){
  $_SESSION['user_id'] = $_POST['user_id'];
}


?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>やまったー | プロフィール</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="css/nakai.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <link href="css/yamane.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <link href="css/yamanishi.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">
  <link href=”https://use.fontawesome.com/releases/v6.0.0/css/all.css” rel=”stylesheet”>
</head>
<style>

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
          <form action="genre_select.php" method="post">
      <?php
        if($_SESSION['genre'] != "すべて"){
echo        '<input type="submit" id="1" name="example3"  value="すべて"><label for="1">　♪ すべて</label>';
        }else{
echo        '<input type="submit" id="1" name="example3" value="すべて"><label style="background: #FBA8B8;color: #fff;" for="1">　♪ すべて</label>';
        }
        if($_SESSION['genre'] != "JPOP"){
echo        '<input type="submit" id="2" name="example3"  value="JPOP"><label for="2">　♪ JPOP</label>';
        }else{
echo        '<input type="submit" id="2" name="example3"  value="JPOP"><label style="background: #FBA8B8;color: #fff;" for="2">　♪ JPOP</label>';
        }
        if($_SESSION['genre'] != "洋楽"){
echo        '<input type="submit" id="3" name="example3"  value="洋楽"><label for="3">　♪ 洋楽</label>';
        }else{
echo        '<input type="submit" id="3" name="example3"  value="洋楽"><label  style="background: #FBA8B8;color: #fff;" for="3">　♪ 洋楽</label>';
        }
        if($_SESSION['genre'] != "アニソン"){
echo        '<input type="submit" id="4" name="example3"  value="アニソン"><label for="4">　♪ アニソン</label>';
        }else{
echo        '<input type="submit" id="4" name="example3"  value="アニソン"><label style="background: #FBA8B8;color: #fff;" for="4">　♪ アニソン</label>';
        }
        if($_SESSION['genre'] != "クラシック"){
echo        '<input type="submit" id="5" name="example3"  value="クラシック"><label for="5">　♪ クラシック</label>';
        }else{
echo        '<input type="submit" id="5" name="example3"  value="クラシック"><label style="background: #FBA8B8;color: #fff;" for="5">　♪ クラシック</label>';
        }
        if($_SESSION['genre'] != "ロック"){
echo        '<input type="submit" id="6" name="example3"  value="ロック"><label for="6">　♪ ロック</label>';
        }else{
echo        '<input type="submit" id="6" name="example3"  value="ロック"><label style="background: #FBA8B8;color: #fff;" for="6">　♪ ロック</label>';
        }
        if($_SESSION['genre'] != "VOCALOID"){
echo        '<input type="submit" id="7" name="example3"  value="VOCALOID"><label for="7">　♪ VOCALOID</label>';
        }else{
echo        '<input type="submit" id="7" name="example3"  value="VOCALOID"><label style="background: #FBA8B8;color: #fff;" for="7">　♪ VOCALOID</label>';
        }
        if($_SESSION['genre'] != "ギター"){
echo        '<input type="submit" id="8" name="example3"  value="ギター"><label for="8">　♪ ギター</label>';
        }else{
echo        '<input type="submit" id="8" name="example3"  value="ギター"><label style="background: #FBA8B8;color: #fff;" for="8">　♪ ギター</label>';
        }
        if($_SESSION['genre'] != "楽器"){
echo        '<input type="submit" id="9" name="example3"  value="楽器"><label for="9">　♪ 楽器</label>';
        }else{
echo        '<input type="submit" id="9" name="example3"  value="楽器"><label style="background: #FBA8B8;color: #fff;" for="9">　♪ 楽器</label>';
        }
        if($_SESSION['genre'] != "その他"){
echo        '<input type="submit" id="10" name="example3"  value="その他"><label style="margin-bottom: -10px;" for="10">　♪ その他</label><br>';
        }else{
echo        '<input type="submit" id="10" name="example3"  value="その他"><label style="margin-bottom: -10px; background: #FBA8B8;color: #fff;" for="10">　♪ その他</label><br>';
        }
        if($_SESSION['genre'] != "プロフィール"){
echo        '<hr class="start_0_ys color_yamani"><br>
            <input type="submit"  id="11" name="example3" value="プロフィール"><label class="nabi_ys" style="margin-bottom: 5px;" for="11">　プロフィール</gita-></label>';
        }else{
echo        '<hr class="start_0_ys color_yamani"><br>
            <input type="submit"  id="11" name="example3"  value="プロフィール"><label class="nabi_ys" style="margin-bottom: 5px;background: #FBA8B8;color: #fff;"" for="11">　プロフィール</gita-></label>';
        }
      ?>
          </form>
          <hr class="start_0_ys color_yamani"><br>
          <input type="radio" id="12" name="example3" onclick="location.href='logout.php'" value="遷移"><label class="nabi_ys" for="12">　ログアウト</gita-></label>
        </div>
      </div>

      <div class="col-md-9 col-lg-9">

        <div class="row yoko_ys" style="margin-top:20px;">

          <div class="col-md-2 col-lg-2"><br>
            <?php 
           
            $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
            $sql1 = "select * from user where user_id = ?";
            $ps1 = $pdo->prepare($sql1);
            $ps1->bindValue(1,$_SESSION['user_id'],PDO::PARAM_INT);
            $ps1->execute();

            $user_id = null;
            $name=null;
            $aikon = null;
            $introduction = null;

            foreach($ps1 as $row1){
                $name = $row1['user_name'];
                $aikon = $row1['media'];
                $user_id = $row1['user_id'];
                $introduction = $row1['self_introduction'];
              }
              //アイコン表示
              if (!empty($aikon) || isset($aikon)) { //設定している場合

                $base64_image = base64_encode($aikon);

                echo  '<img class="image_middle" width="250"src="data:image/jpeg;base64,' .  $base64_image . '" />　';

              } else { //設定してない場合
                echo '<img class="image_middle" src="img/pink.png">';
              };
            ?>
          </div>

          <div class="col-md-8 col-lg-8" style="margin-left:-50px;"><br>
            <p><?php echo $name; ?>
            <p>ID:<?php echo $user_id; ?></p>

          </div>

          <div class="col-md-2 col-lg-2">
          </div>
        </div>

        <div class="row yoko_ys">

          <div class="col-md-12 start_0_ys"><br>
            <div class="padding20_ys">
              <h6><?php echo $introduction; ?></h6><br>
              
              <?php
              $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
              $sql = "SELECT *  FROM favorite_genre WHERE user_id=?";
              $ps = $pdo->prepare($sql);
              $ps->bindValue(1, $user_id, PDO::PARAM_STR);
              $ps->execute();

              $sql1 = "SELECT count(*)  FROM favorite_genre WHERE user_id=?";
              $ps1 = $pdo->prepare($sql1);
              $ps1->bindValue(1, $user_id, PDO::PARAM_STR);
              $ps1->execute();

              foreach($ps1 as $row1){
                $count = $row1['count(*)'];
              }

            if(!empty($count)){
              echo '<p style="color:#FBA8B8; border-bottom:1px solid #FBA8B8; width:115px">好きなジャンル</p>';
              foreach ($ps as $row) {
                $name = $row['genre_name'];
                echo '<span class="border border-#FBA8B8 badge text-bg-white color_yamani">' . $name . '</span>  ';
              }
            }
              ?>
            </div>
            <hr>
          </div>
        </div>
        <div class="row yoko_ys">

          <div class="wrapper">
            <div class="ul_ys">
              <ul class="tab">

                <div class="col-md-5">
                  <div class="middll_yamani">

                    <li><a style="color:#333;text-decoration: none;" href="#toukou">投稿</a></li>
                  </div>

                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                  <div class="middll_yamani">
                    <li><a style="color:#333;text-decoration: none;" href="#iine">いいね</a></li>
                  </div>
                </div>
              </ul>
            </div>
          </div>
        </div>

        <div class="row yoko_ys">

          <div class="col-md-12 start_0_ys back_pink_ys" style="height: 100vh;">

            <hr class="start_0_ys">

            <div id="toukou" class="area">
            <!--<div style="height:40px;width:200px;background-color: #FBA8B8; opacity:0.4; position: absolute; top:269px;left:455px; z-index: -10; border-radius: 10px 10px 10px 10px;"></div>-->
              <!--ここからtweetの枠線の設定-->
              <div class="waku_ys">

                <div class="haikei_yp">
                  <div class="padding30_ys">
                    <?php
                    $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
                    $sql = "select * from post where user_id = ? order by post_id desc";
                    $ps = $pdo->prepare($sql);
                    $ps->bindValue(1, $user_id, PDO::PARAM_INT);
                    $ps->execute();
                    foreach ($ps as $row) {
                      $sql1 = "select * from user where user_id = ?";
                      $ps1 = $pdo->prepare($sql1);
                      $ps1->bindValue(1, $row['user_id'], PDO::PARAM_INT);
                      $ps1->execute();
                      $name = null;
                      foreach ($ps1 as $row1) {
                        $name = $row1['user_name'];
                      }
                      echo   '<div class="p_ys">';
                      //アイコン表示
                  if (!empty($aikon) || isset($aikon)) { //設定している場合

                    $base64_image = base64_encode($aikon);

                    echo '<br>' . '<img class="image_middle" width="250"src="data:image/jpeg;base64,' .  $base64_image . '" />　';

                  } else { //設定してない場合
                    echo '<img class="image_middle" src="img/pink.png">　';
                  }

                  echo   $name ;
                  //ジャンル表示
                  $sql1 = "SELECT genre_name from genre where genre_id = ?";
                      $ps1 = $pdo->prepare($sql1);
                      $ps1->bindValue(1, $row['genre_id'], PDO::PARAM_INT);
                      $ps1->execute();
                      foreach($ps1 as $row1){
                        $genre_name = $row1['genre_name'];
                      }
                      echo '<span class="border border-#FBA8B8 badge text-bg-white color_yamani"style="margin-left:10px;">'. $genre_name . '</span>  ';

echo                  '<form action="08_投稿詳細画面.php" method="post">'.
                      '<button name="detail" type="hidden" value="'.$row['post_id'].'" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none; width: 870px; text-align:left;">'.
                        '<div style="font-size: 20px;">';
                        echo nl2br($row['post_contents']).
                        '</div>';
                        //画像があるか検索
                        $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
                        $sql2 = "select * from post where post_id = ?";
                        $ps2 = $pdo->prepare($sql2);
                        $ps2->bindValue(1,$row['post_id'],PDO::PARAM_INT);
                        $ps2->execute();
                    
                    foreach($ps2 as $row2){
                      $type = $row2['media2'];
                      $media = $row2['media1'];
                    }

                    if($type == '1'){ //画像
                      $image_data = $media;

                      $base64_image = base64_encode($image_data);

                      echo '<br>'.'<img width="200"src="data:image/jpeg;base64,'.  $base64_image.'" /><br>';
                      
                    }else if($type == '2'){//動画

                      $image_data = $media;

                      $base64_image = base64_encode($image_data);
                      echo '<br>'.'<video style="  max-height:300px;  max-width:600px;"  src="data:video/mp4;base64,'.$base64_image.'"controls></video><br>';
                    }
      echo                '</button>'.  
                        '<p style="margin-top:20px;color:#FBA8B8;padding-left:15px;width: 300px;">'.$row['date_time'].'</p>'.
                        '</form>';
                      $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
                      $sql3 = "select * from favorite_post where user_id = ? and like_subject = ?";
                      $ps3 = $pdo->prepare($sql3);
                      $ps3->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_INT);
                      $ps3->bindValue(2,$row['post_id'],PDO::PARAM_STR);
                      $ps3->execute();
                      $check_like = null;
                      foreach($ps3 as $row3){
                       $check_like = $row3['like_id'];
                      }
                      echo '<div style="position: relative;top:-45px;left:640px;width: 150px;height:30px;">';
      
                      if(isset($check_like)){//いいね判別
      echo               '<form action="addlike.php" method="post">';
                        $like = "like".$row['post_id'];
      echo                '<button type="hidden" name="like" value="1,'.$row['post_id'].',13" style="width:90px;background-color:white;border:none;">'.//最初からいいねしてるかの判別
                        '<input type="checkbox" checked="checked" id="'.$like.'">'.
                        '<label for="'.$like.'">'.
                          '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">'.
                            '<path
                              d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />'.
                              '</svg>　'.$row['fabulous'].'　　　'.
                        '</label>
                        </button>
                        </form>';
                      }else{
      echo                '<form action="addlike.php" method="post">';
                          $like = "like".$row['post_id'];
      echo                '<button type="hidden" name="like" value="2,'.$row['post_id'].',13" style="width:90px;background-color:white;border:none;">'.//最初からいいねしてるかの判別
                        '<input type="checkbox" id="'.$like.'">'.
                        '<label for="'.$like.'">'.
                          '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">'.
                            '<path
                              d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />'.
                              '</svg>　'.$row['fabulous'].'　　　'.
                        '</label>
                        </button>
                        </form>';
                      }               
      echo              '<form action="09_投稿返信画面.php" method="post">
                         <button name="reply" type="hidden" value="' . $row['post_id'] . '" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none;">
                         <img style="margin-left: 137px; margin-top:-55px;" src="icon/コメント.svg">
                         </button>
                         </form>
                         <div style="position: relative;top:-55px;left:190px;">
                          　' . $row['comments'].
                        '</div>
                      </div>
                    </div>';  
                }      
      ?>
                  </div>
                </div>
              </div>
              <!--↑投稿-->
            </div>

            <div id="iine" class="area">
            <!--<div style="height:40px;width:200px;background-color: #FBA8B8; opacity:0.4; position: absolute; top:269px;right:95px; z-index: -10; border-radius: 10px 10px 10px 10px;"></div>-->
              <div class="waku_ys">

                <div class="haikei_yp">
                  <div class="padding30_ys">
                    <?php
                    $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
                    $sql = "SELECT * FROM favorite_post WHERE user_id = ? ORDER BY like_id DESC"; //いいねしてるツイ参照
                    $ps = $pdo->prepare($sql);
                    $ps->bindValue(1, $user_id, PDO::PARAM_INT);
                    $ps->execute();
                    foreach ($ps as $row) {
                      $c = substr($row['like_subject'],0,2);
                      if($c != "00"){
                        $sql1 = "SELECT * FROM post WHERE post_id = ?"; //元ツイ参照
                        $ps1 = $pdo->prepare($sql1);
                        $ps1->bindValue(1, $row['like_subject'], PDO::PARAM_INT);
                        $ps1->execute();
                        foreach ($ps1 as $row1) {
                          $post_id = $row1['post_id'];
                          $user_id = $row1['user_id'];
                          $genre_id = $row1['genre_id'];
                          $post_contets = $row1['post_contents'];
                          $date_time = $row1['date_time'];
                          $fabulous = $row1['fabulous'];
                          $comments = $row1['comments'];
                          $media1 = $row1['media1'];
                        }

                        $sql2 = "SELECT * FROM user WHERE user_id=?"; //いいねされてる垢を参照
                        $ps2 = $pdo->prepare($sql2);
                        $ps2->bindValue(1, $user_id, PDO::PARAM_INT);
                        $ps2->execute();
                        foreach ($ps2 as $row2) {
                          $user_name = $row2['user_name'];
                          $aikon = $row2['media'];
                          $self_introduction = $row2['self_introduction'];
                        }


                        echo   '<div class="p_ys">';
                        //アイコン表示
                        if (!empty($aikon) || isset($aikon)) { //設定している場合

                          $base64_image = base64_encode($aikon);

                          echo '<br>' . '<img class="image_middle" width="250"src="data:image/jpeg;base64,' .  $base64_image . '" />　';
                        } else { //設定してない場合
                          echo '<img class="image_middle" src="img/pink.png">　';
                        }

                        echo   $user_name;
                        //ジャンル表示
                        $sql3 = "SELECT genre_name FROM genre WHERE genre_id = ?";
                        $ps3 = $pdo->prepare($sql3);
                        $ps3->bindValue(1, $genre_id, PDO::PARAM_INT);
                        $ps3->execute();
                        foreach ($ps3 as $row3) {
                          $genre_name = $row3['genre_name'];
                        }
                        echo '<span class="border border-#FBA8B8 badge text-bg-white color_yamani"style="margin-left:10px;">' . $genre_name . '</span>  ';

                        echo '<form action="08_投稿詳細画面.php" method="post">' .
                        '<button name="detail" type="hidden" value="' . $post_id . '" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none; width: 870px; text-align:left;">' .
                        '<div style="font-size: 20px;">';
                        echo nl2br($post_contets) .
                        '</div>';
                        //画像があるか検索
                        $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
                        $sql4 = "SELECT * FROM post WHERE post_id = ?";
                        $ps4 = $pdo->prepare($sql4);
                        $ps4->bindValue(1, $post_id, PDO::PARAM_INT);
                        $ps4->execute();
                        
                        foreach($ps4 as $row4){
                          $type = $row4['media2'];
                          $media = $row4['media1'];
                        }

                        if($type == '1'){ //画像
                          $image_data = $media;

                          $base64_image = base64_encode($image_data);

                          echo '<br>'.'<img width="200"src="data:image/jpeg;base64,'.  $base64_image.'" /><br>';

                        }else if($type == '2'){//動画

                          $image_data = $media;

                          $base64_image = base64_encode($image_data);
                          echo '<br>'.'<video style="  max-height:300px;  max-width:600px;"  src="data:video/mp4;base64,'.$base64_image.'"controls></video>';

                        }
                        echo '</button>' .
                        '<p style="margin-top:20px;color:#FBA8B8;padding-left:15px;width: 300px;">' . $date_time . '</p>' .
                        '</form>';
                        echo '<div style="position: relative;top:-45px;left:640px;width: 150px;height:40px;">';
                        $like = "like";
                        echo '<button type="hidden" name="like" value="1,' . $post_id . '" style="width:90px;background-color:white;border:none;">' . //最初からいいねしてるかの判別
                        '<input type="checkbox" checked="checked" id="' . $like . '" disabled>' .
                        '<label for="' . $like . '">' .
                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">' .
                        '<path
                          d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />' .
                        '</svg>　' . $fabulous . '　　　' .
                        '</label>
                        </button>';
                        echo '<a href="09_投稿返信画面.php" style="text-decoration: none;">
                        <img style="margin-left:137px; margin-top:-55px;" src="icon/コメント.svg">
                        </a>
                        <div style="position: relative;top:-55px;left:190px;">
                        　' . $comments .
                        '</div>
                        </div>
                        </div>';
                      }else{
                        $sql1 = "SELECT * FROM reply WHERE reply_id = ?"; //元ツイ参照
                        $ps1 = $pdo->prepare($sql1);
                        $ps1->bindValue(1, $row['like_subject'], PDO::PARAM_INT);
                        $ps1->execute();
                        foreach ($ps1 as $row1) {
                          $reply_id = $row1['reply_id'];
                          $reply_subject = $row1['reply_subject'];
                          $user_id = $row1['user_id'];
                          $reply_contets = $row1['reply_contents'];
                          $date_time = $row1['date_time'];
                          $fabulous = $row1['fabulous'];
                          $comments = $row1['comments'];
                          $media1 = $row1['media1'];
                        }

                        $sql2 = "SELECT * FROM user WHERE user_id=?"; //いいねされてる垢を参照
                        $ps2 = $pdo->prepare($sql2);
                        $ps2->bindValue(1, $user_id, PDO::PARAM_INT);
                        $ps2->execute();
                        foreach ($ps2 as $row2) {
                          $user_name = $row2['user_name'];
                          $aikon = $row2['media'];
                          $self_introduction = $row2['self_introduction'];
                        }


                        echo   '<div class="p_ys">';
                        //アイコン表示
                        if (!empty($aikon) || isset($aikon)) { //設定している場合

                          $base64_image = base64_encode($aikon);

                          echo '<br>' . '<img class="image_middle" width="250"src="data:image/jpeg;base64,' .  $base64_image . '" />　';
                        } else { //設定してない場合
                          echo '<img class="image_middle" src="img/pink.png">　';
                        }

                        echo   $user_name;
                        $d = substr($reply_subject,0,2);
                        if($d == "00"){
                          $sql8 = "SELECT reply.reply_id, reply.reply_subject, reply.user_id, reply.reply_contents, reply.date_time, reply.fabulous, reply.comments, reply.media1, reply.media2,
                                   user.user_id, user.user_name, user.email_address, user.password, user.media, user.self_introduction
                                   FROM reply INNER JOIN user ON reply.user_id = user.user_id WHERE reply.reply_id = ?";
                          $ps8 = $pdo->prepare($sql8);
                          $ps8->bindValue(1, $reply_subject, PDO::PARAM_STR);
                          $ps8->execute();
                          foreach ($ps8 as $row8) {
                            $subjectname = $row8['user_name'];
                          }
                        }else{
                          $sql8 = "SELECT post.post_id, post.user_id, post.genre_id, post.post_contents, post.date_time, post.fabulous, post.comments, post.media1, post.media2,
                                   user.user_id, user.user_name, user.email_address, user.password, user.media, user.self_introduction
                                   FROM post INNER JOIN user ON post.user_id = user.user_id WHERE post.post_id = ?";
                          $ps8 = $pdo->prepare($sql8);
                          $ps8->bindValue(1, $reply_subject, PDO::PARAM_STR);
                          $ps8->execute();
                          foreach ($ps8 as $row8) {
                            $subjectname = $row8['user_name'];
                          }
                        }
                        if(isset($subjectname)){
                          echo '<span style="margin-top:20px;color:#FBA8B8;padding-left:15px;">@'.$subjectname.'さんへ返信</span>';
                        }else{
                          echo '<span style="margin-top:20px;color:#FBA8B8;padding-left:15px;">返信元は削除されました</span>';
                        }

                        echo '<form action="08_投稿詳細画面.php" method="post">' .
                        '<button name="detail" type="hidden" value="' . $reply_id . '" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none; width: 870px; text-align:left;">' .
                        '<div style="font-size: 20px;">';
                        echo nl2br($reply_contets) .
                        '</div>';
                        //画像があるか検索
                        $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
                        $sql4 = "select * from reply where reply_id = ?";
                        $ps4 = $pdo->prepare($sql4);
                        $ps4->bindValue(1, $reply_id, PDO::PARAM_INT);
                        $ps4->execute();
                        
                        foreach($ps4 as $row4){
                          $type = $row4['media2'];
                          $media = $row4['media1'];
                        }

                        if($type == '1'){ //画像
                          $image_data = $media;

                          $base64_image = base64_encode($image_data);

                          echo '<br>'.'<img width="200"src="data:image/jpeg;base64,'.  $base64_image.'" /><br>';

                        }else if($type == '2'){//動画

                          $image_data = $media;

                          $base64_image = base64_encode($image_data);
                          echo '<br>'.'<video style="  max-height:300px;  max-width:600px;"  src="data:video/mp4;base64,'.$base64_image.'"controls></video>';

                        }
                        echo '</button>' .
                        '<p style="margin-top:20px;color:#FBA8B8;padding-left:15px;width: 300px;">' . $date_time . '</p>' .
                        '</form>';
                        echo '<div style="position: relative;top:-45px;left:640px;width: 150px;height:40px;">';
                        $like = "like";
                        echo '<button type="hidden" name="like" value="1,' . $reply_id . '" style="width:90px;background-color:white;border:none;">' . //最初からいいねしてるかの判別
                        '<input type="checkbox" checked="checked" id="' . $like . '" disabled>' .
                        '<label for="' . $like . '">' .
                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">' .
                        '<path
                          d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />' .
                        '</svg>　' . $fabulous . '　　　' .
                        '</label>
                        </button>';
                        echo '<a href="09_投稿返信画面.php" style="text-decoration: none;">
                        <img style="margin-left:137px; margin-top:-55px;" src="icon/コメント.svg">
                        </a>
                        <div style="position: relative;top:-55px;left:190px;">
                        　' . $comments .
                        '</div>
                        </div>
                        </div>';
                      }
                    }

                    ?>
                  </div>
                </div>
              </div>
              <!--↑いいね-->
            </div>

            <!--↓ボタン-->
            <div class="box">
              <button type="button" class="btn container-fluid color_white_yamani border border-dark" style=" width: 65px;height: 65px;background: #FBA8B8;border-radius: 50%;" onclick="location.href='10_新規投稿作成画面.php'">＋</button>
            </div>

            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">

            <div id="page_top"><a href="#"></a></div>
            <!--wrapper-->
          </div>
          <div class="col-md-12 start_0_ys"></div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="sprict/yamanishi.js"></script>
  <script src="sprict/yamanisi_climb.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>