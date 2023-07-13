<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>やまったー | 投稿詳細</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="css/nakai.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <link href="css/yamane.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <link href="css/yamanishi.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<style>
  .material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 48;
    font-size: 40px;
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
          <input type="radio" id="12" name="example3" onclick="location.href='logout.php'" value="遷移"><label class="nabi_ys" for="12">　ログアウト</gita-></label>
        </div>
      </div>
      <div class="col-md-9 col-lg-9 back_pink_yamani start_0_ys" style="border-left:1px solid #c8c8c8;">

        <div class="row">
          <div class="col-md-12 col-lg-12" style="height: 100vh;">

            <button type="button" class="btn container-fluid  magin30_yamanisi color_white_yamani border border-light syousai_do_ys" style="margin-left: 3%;width: 150px;" onclick="history.back();" value="遷移">戻る</button>
            <!--<form action="09_投稿返信画面.php" method="post">
              <button type="hidden" name="reply" class="btn container-fluid  magin30_yamanisi color_white_yamani border border-light syousai_do_ys" style="width: 150px;margin-left: 62%;" value="<?php echo $_POST['detail']; ?>">返信する</button>
            </form>-->

            <div class="waku_ys">

              <div class="haikei_yp">
                <div class="padding30_ys">
                  <div style="margin-bottom: 50px;">
                    <?php
                    $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
                    $a = substr($_POST['detail'], 0, 2);
                    if ($a == "00") {
                      $sql = "SELECT reply.reply_id, reply.user_id, reply.reply_contents, reply.date_time, reply.fabulous, reply.comments, reply.media1, reply.media2, 
                              user.user_name, user.email_address, user.password, user.media, user.self_introduction 
                              FROM reply INNER JOIN user ON reply.user_id = user.user_id 
                              WHERE reply_id = ?";
                      $ps = $pdo->prepare($sql);
                      $ps->bindValue(1, $_POST['detail'], PDO::PARAM_STR);
                      $ps->execute();
                      foreach ($ps as $row) {
                        echo '<div class="p_ys">';
                        //アイコン表示
                  if (!empty($row['media']) || isset($row['media'])) { //設定している場合

                    $base64_image = base64_encode($row['media']);

                    echo '<br>' . '<img class="image_middle" width="250"src="data:image/jpeg;base64,' .  $base64_image . '" />　';

                  } else { //設定してない場合
                    echo '<img class="image_middle" src="img/pink.png">　';
                  }

                  echo   $row['user_name'] ;
                  //他人のプロフィールに遷移
echo             '<form action="13_他人プロフィール.php" method="post">'.
                    '<button name="user_id" type="hidden" value="'.$row['user_id'].'" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none; text-align:right;position: relative;top: -65px;left: 775px;">
                      <span class="material-symbols-outlined">face</span>
                    </button>
                  </form>
                      <div style="font-size: 20px;">'
                          . $row['reply_contents'];
                        //画像があるか検索
                        $sql2 = "SELECT * FROM reply WHERE reply_id = ?";
                        $ps2 = $pdo->prepare($sql2);
                        $ps2->bindValue(1, $row['reply_id'], PDO::PARAM_INT);
                        $ps2->execute();
                        $row2 = $ps2->fetch(PDO::FETCH_ASSOC);

                        if (!empty($row2['media1'])) {
                          $image_data = $row2['media1'];

                          $base64_image = base64_encode($image_data);

                          echo '<br>' . '<img width="250"src="data:image/jpeg;base64,' .  $base64_image . '" /><br>';
                        }
                        echo '</div>
                            <div class="row">
                              <div class="col-md-9 col-lg-9 start_0_ys"><p style="margin-top:20px;color:#FBA8B8;padding-left:15px;">'.$row['date_time'].'</p></div>
                                <div class="col-md-1 col-lg-1 start_0_ys">
                                  <input type="checkbox" id="' . $row['reply_id'] . '">

                                  <label for="' . $row['reply_id'] . '">
                                    <!--<div class="lavel_like">-->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                      <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                    </svg>　' . $row['fabulous'] . '　　　
                                  </label><!--終了ラベルタグ最初はコメントの場所も指定していたけどいいねのところだけ囲った-->
                                </div>
                                <div class="col-md-2 col-lg-2 start_0_ys">
                                <form action="09_投稿返信画面.php" method="post">
                                <button name="reply" type="hidden" value="' . $row['reply_id'] . '" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none;">
                                  <img style="margin-left: 50px;" src="icon/コメント.svg">
                                </button>
                              </form>
                              <div style=" position: relative;bottom: 43px;left: 100px;">
                                  　' . $row['comments'] . '　
                                </div>
                              </div>
                            </div>
                          </div>';
                      }
                    } else {
                      $sql = "SELECT post.post_id, post.user_id, post.genre_id, post.post_contents, post.date_time, post.fabulous, post.comments, post.media1, post.media2, 
                              user.user_name, user.email_address, user.password, user.media, user.self_introduction 
                              FROM post INNER JOIN user ON post.user_id = user.user_id 
                              WHERE post_id = ?";
                      $ps = $pdo->prepare($sql);
                      $ps->bindValue(1, $_POST['detail'], PDO::PARAM_INT);
                      $ps->execute();
                      foreach ($ps as $row) {
                        echo '<div class="p_ys">';
                        //アイコン表示
                  if (!empty($row['media']) || isset($row['media'])) { //設定している場合

                    $base64_image = base64_encode($row['media']);

                    echo '<br>' . '<img class="image_middle" width="250"src="data:image/jpeg;base64,' .  $base64_image . '" />　';

                  } else { //設定してない場合
                    echo '<img class="image_middle" src="img/pink.png">　';
                  }

                  echo   $row['user_name'] ;
                  //ジャンル表示
                  $sql1 = "SELECT genre_name from genre where genre_id = ?";
                      $ps1 = $pdo->prepare($sql1);
                      $ps1->bindValue(1, $row['genre_id'], PDO::PARAM_INT);
                      $ps1->execute();
                      foreach($ps1 as $row1){
                        $genre_name = $row1['genre_name'];
                      }
                      echo '<span class="border border-#FBA8B8 badge text-bg-white color_yamani"style="margin-left:10px;">' . $genre_name . '</span>  ';
                  //他人のプロフィールに遷移
echo             '<form action="13_他人プロフィール.php" method="post">'.
                    '<button name="user_id" type="hidden" value="'.$row['user_id'].'" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none; text-align:right;position: relative;top: -65px;left: 775px;">
                      <span class="material-symbols-outlined">face</span>
                    </button>
                  </form>
                            <div style="font-size: 20px;">'
                          . $row['post_contents'];
                        //画像があるか検索
                        $sql2 = "SELECT * FROM post WHERE post_id = ?";
                        $ps2 = $pdo->prepare($sql2);
                        $ps2->bindValue(1, $row['post_id'], PDO::PARAM_INT);
                        $ps2->execute();
                        $row2 = $ps2->fetch(PDO::FETCH_ASSOC);

                        if (!empty($row2['media1'])) {
                          $image_data = $row2['media1'];

                          $base64_image = base64_encode($image_data);

                          echo '<br>' . '<img width="250"src="data:image/jpeg;base64,' .  $base64_image . '" /><br>';
                        }
                        echo '</div>
                            <div class="row">
                              <div class="col-md-9 col-lg-9 start_0_ys"><p style="margin-top:20px;color:#FBA8B8;padding-left:15px;">'.$row['date_time'].'</p></div>
                                <div class="col-md-1 col-lg-1 start_0_ys">
                                  <input type="checkbox" id="' . $row['post_id'] . '">

                                  <label for="' . $row['post_id'] . '">
                                    <!--<div class="lavel_like">-->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                      <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                    </svg>　' . $row['fabulous'] . '　　　
                                  </label><!--終了ラベルタグ最初はコメントの場所も指定していたけどいいねのところだけ囲った-->
                                </div>
                                <div class="col-md-2 col-lg-2 start_0_ys">';
                        echo '<form action="09_投稿返信画面.php" method="post">
                                <button name="reply" type="hidden" value="' . $row['post_id'] . '" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none;">
                                  <img style="margin-left: 50px;" src="icon/コメント.svg">
                                </button>
                              </form>
                              <div style=" position: relative;bottom: 43px;left: 100px;">
                                  　' . $row['comments'] . '　
                                </div>
                              </div>
                            </div>
                          </div>';
                      }
                    }
                    ?>
                  </div>
                </div>
                <!--⇩返信-->
                <div class="hensin_waku_ys">
                  <?php
                  $sql = "SELECT reply.reply_id, reply.user_id, reply.reply_contents, reply.date_time, reply.fabulous, reply.comments, reply.media1, reply.media2, 
                              user.user_name, user.email_address, user.password, user.media, user.self_introduction 
                              FROM reply INNER JOIN user ON reply.user_id = user.user_id 
                              WHERE reply_subject = ? ORDER BY date_time DESC";
                  $ps = $pdo->prepare($sql);
                  $ps->bindValue(1, $_POST['detail'], PDO::PARAM_INT);
                  $ps->execute();
                  foreach ($ps as $row) {
                    echo '<div class="haikei_yp">
                    <div class="padding30_ys">
                    <div class="p_he_ys">';
                      //アイコン表示
                      if (!empty($row['media']) || isset($row['media'])) { //設定している場合
    
                        $base64_image = base64_encode($row['media']);
    
                        echo '<br>' . '<img class="image_middle" width="250"src="data:image/jpeg;base64,' .  $base64_image . '" />　';
    
                      } else { //設定してない場合
                        echo '<img class="image_middle" src="img/pink.png">　';
                      }
                      $a = substr($_POST['detail'],0,2);
                      if($a == "00"){
                        $sql3 = "SELECT reply.reply_id, reply.reply_subject, reply.user.id, reply.reply_contents, reply.date_time, reply.fabulous, reply.comments, reply.media1, reply.media2,
                                 user.user_id, user.user_name, user.email_address, user.password, user.media, user.self_introduction
                                 FROM reply INNER JOIN user ON reply.user_id = user.user_id WHERE reply.reply_id = ?";
                        $ps3 = $pdo->prepare($sql3);
                        $ps3->bindValue(1, $_POST['detail'], PDO::PARAM_STR);
                        $ps3->execute();
                        foreach ($ps3 as $row3) {
                          $subjectname = $row3['user_name'];
                        }
                      }else{
                        $sql3 = "SELECT post.post_id, post.user_id, post.genre_id, post.post_contents, post.date_time, post.fabulous, post.comments, post.media1, post.media2,
                                 user.user_id, user.user_name, user.email_address, user.password, user.media, user.self_introduction
                                 FROM post INNER JOIN user ON post.user_id = user.user_id WHERE post.post_id = ?";
                        $ps3 = $pdo->prepare($sql3);
                        $ps3->bindValue(1, $_POST['detail'], PDO::PARAM_STR);
                        $ps3->execute();
                        foreach ($ps3 as $row3) {
                          $subjectname = $row3['user_name'];
                        }
                      }
                      echo   $row['user_name'].' <span style="margin-top:20px;color:#FBA8B8;padding-left:15px;">@'.$subjectname.'さんへ返信</span>';
                      //他人のプロフィールに遷移
                      echo'<form action="13_他人プロフィール.php" method="post">'.
                        '<button name="user_id" type="hidden" value="'.$row['user_id'].'" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none; text-align:right;position: relative;top: -65px;left: 775px;">
                          <span class="material-symbols-outlined">face</span>
                        </button>
                      </form>';
    
                      echo '<form action="08_投稿詳細画面.php" method="post">'.
                      '<button name="detail" type="hidden" value="'.$row['reply_id'].'" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none; width: 870px; text-align:left;">'.
                      '<div style="font-size: 18px;">';
                      echo $row['reply_contents'];

                    //画像があるか検索
                    $sql2 = "SELECT * FROM reply WHERE reply_id = ?";
                    $ps2 = $pdo->prepare($sql2);
                    $ps2->bindValue(1, $row['reply_id'], PDO::PARAM_INT);
                    $ps2->execute();
                    $row2 = $ps2->fetch(PDO::FETCH_ASSOC);

                    if (!empty($row2['media1'])) {
                      $image_data = $row2['media1'];

                      $base64_image = base64_encode($image_data);

                      echo '<br>' . '<img width="250"src="data:image/jpeg;base64,' .  $base64_image . '" /><br>';
                    }

                    echo'</div>' .
                      '</button>
                      <div class="row">
                        <div class="col-md-9 col-lg-9 start_0_ys"><p style="margin-top:20px;color:#FBA8B8;padding-left:15px;">'.$row['date_time'].'</p></div>
                          <div class="col-md-1 col-lg-1 start_0_ys">
                            <input type="checkbox" id="' . $row['reply_id'] . '">

                            <label for="' . $row['reply_id'] . '">
                              <!--<div class="lavel_like">-->
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                              </svg>　' . $row['fabulous'] . '　　　
                            </label><!--終了ラベルタグ最初はコメントの場所も指定していたけどいいねのところだけ囲った-->
                          </div>
                          </form>
                          <div class="col-md-2 col-lg-2 start_0_ys">
                            <form action="09_投稿返信画面.php" method="post">
                              <button name="reply" type="hidden" value="' . $row['reply_id'] . '" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none;">
                                <img style="margin-left: 50px;" src="icon/コメント.svg">
                              </button>
                            </form>
                            <div style=" position: relative;bottom: 43px;left: 100px;">
                            　' . $row['comments'] . '　
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';
                  }
                  ?>
                </div>
              </div>
            </div>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="sprict/yamanishi.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>