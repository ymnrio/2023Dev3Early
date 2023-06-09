<?php session_start(); ?>
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

      <div class="col-md-9 col-lg-9">

        <div class="row yoko_ys" style="margin-top:20px;">

          <div class="col-md-2 col-lg-2"><br>
            <?php
            $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
            $sql1 = "select * from user where user_id = ?";
            $ps1 = $pdo->prepare($sql1);
            $ps1->bindValue(1, $_SESSION['user']['id'], PDO::PARAM_INT);
            $ps1->execute();
            $name = null;
            foreach ($ps1 as $row1) {
              $name = $row1['user_name'];
              $aikon = $row1['media'];
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
            <p>　<?php echo $_SESSION['user']['name']; ?>
            <p>　ID:<?php echo $_SESSION['user']['id']; ?></p>
            <?php
            if (!empty($_SESSION['trash'])) {
              echo      '<form action="drop.php" method="post">
            <div style="width: 400px;height: 200px;border: 1px solid; background-color: rgba(251, 140, 184, 0.9);position: fixed;z-index:10; margin-top:180px;margin-left:50px;">
              <img src="icon/ギター.svg">
              <img style="margin-left: 326px;" src="icon/マイク(カラオケ).svg">
              <h5 style="text-align: center;">本当に削除してもよろしいでしょうか
                <img style="margin-top: -8px;margin-right: 8px;" src="icon/16音符.svg"></h5>
              <button type="hidden" name="cancel" value="キャンセル"class="btn container-fluid "style="background-color:#fff;width: 120px;margin-left:50px;margin-top: 30px;">キャンセル</button>
              <button type="hidden" name="drop" value="' . $_SESSION['trash'] . '"class="btn container-fluid "style="background-color:#fff;width: 120px;margin-left: 55px;margin-top: 30px;">削除</button><br>
              <img style="margin-top: 30px;" src="icon/ヘッドフォン.svg">
              <img style="margin-left: 326px;margin-top: 30px;" src="icon/ピアノ.svg">
            </div>
          </form>';
            }
            ?>

          </div>

          <div class="col-md-2 col-lg-2"><br>
            <button type="button" class="btn container-fluid color_white_yamani" onclick="location.href='06_プロフィール編集画面.php'" value="遷移" style="background-color:#FBA8B8;">編集</button>
            <button type="button" class="btn container-fluid color_white_yamani" onclick="location.href='12_アカウント削除画面.php'" value="遷移" style="background-color:#FBA8B8; padding:7px 0px 7px 0px; margin-top:15px;">アカウント削除</button>
          </div>
        </div>

        <div class="row yoko_ys">

          <div class="col-md-12 start_0_ys"><br>
            <div class="padding20_ys">
              <h6><?php echo nl2br($_SESSION['user']['introduction']); ?></h6><br>

              <?php
              $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
              $sql = "SELECT *  FROM favorite_genre WHERE user_id=?";
              $ps = $pdo->prepare($sql);
              $ps->bindValue(1, $_SESSION['user']['id'], PDO::PARAM_STR);
              $ps->execute();

              $sql1 = "SELECT count(*)  FROM favorite_genre WHERE user_id=?";
              $ps1 = $pdo->prepare($sql1);
              $ps1->bindValue(1, $_SESSION['user']['id'], PDO::PARAM_STR);
              $ps1->execute();

              foreach ($ps1 as $row1) {
                $count = $row1['count(*)'];
              }

              if (!empty($count)) {
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

              <!--ここからtweetの枠線の設定-->
              <div class="waku_ys">

                <div class="haikei_yp">
                  <div class="padding30_ys">
                    <?php
                    $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
                    $sql = "SELECT reply.reply_id, reply.reply_subject, reply.user.id, reply.reply_contents, reply.date_time, reply.fabulous, reply.comments, reply.media1, reply.media2,
                            post.post_id, post.genre_id, post.post_contents, post.date_time, post.fabulous, post.comments, post.media1, post.media2,
                            FROM reply INNER JOIN post ON post.user_id = reply.user_id WHERE reply.user_id = ? order by post.date_time DESC";
                    $ps = $pdo->prepare($sql);
                    $ps->bindValue(1, $_SESSION['user']['id'], PDO::PARAM_INT);
                    $ps->execute();
                    foreach ($ps as $row) {
                      $sql1 = "select * from user where user_id = ?";
                      $ps1 = $pdo->prepare($sql1);
                      $ps1->bindValue(1, $row['user_id'], PDO::PARAM_INT);
                      $ps1->execute();
                      $name = null;
                      $user_id = null;
                      $reply_id = $row['reply_id'];
                      $post_id = $row['post_id'];
                      foreach ($ps1 as $row1) {
                        $name = $row1['user_name'];
                        $user_id = $row1['user_id'];
                      }
                      echo '<div class="p_ys">';
                      //アイコン表示
                      if (!empty($aikon) || isset($aikon)) { //設定している場合

                        $base64_image = base64_encode($aikon);

                        echo '<br>' . '<img class="image_middle" width="250"src="data:image/jpeg;base64,' .  $base64_image . '" />　';
                      } else { //設定してない場合

                        echo '<img class="image_middle" src="img/pink.png">　';
                      }

                      echo   $name;
                      //ジャンル表示

                      if (empty($row['post_id'])) { //投稿の場合
                        $sql2 = "SELECT genre_name from genre where genre_id = ?";
                        $ps2 = $pdo->prepare($sql2);
                        $ps2->bindValue(1, $row['genre_id'], PDO::PARAM_INT);
                        $ps2->execute();
                        foreach ($ps2 as $row2) {
                          $genre_name = $row2['genre_name'];
                        }
                        echo '<span class="border border-#FBA8B8 badge text-bg-white color_yamani"style="margin-left:10px;">' . $genre_name . '</span>  ';


                        //ゴミ箱
                        echo '<form action="trash.php" method="post">' .
                             '<button name="trash" type="hidden" value="' . $row['post_id'] . '" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none; text-align:right;position: relative;top: -65px;left: 770px;">
                              <span class="material-symbols-outlined">delete</span></a>
                              </button>
                              </form>';

                        echo '<form action="08_投稿詳細画面.php" method="post">' .
                             '<button name="detail" type="hidden" value="' . $row['post_id'] . '" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none; width: 870px; text-align:left;">' .
                             '<div style="font-size: 20px;">';
                        echo $row['post_contents'];

                        //画像があるか検索
                        $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
                        $sql3 = "select * from post where post_id = ?";
                        $ps3 = $pdo->prepare($sql3);
                        $ps3->bindValue(1, $row['post_id'], PDO::PARAM_INT);
                        $ps3->execute();
                        $row3 = $ps3->fetch(PDO::FETCH_ASSOC);

                        if (!empty($row3['media1'])) {
                          $image_data = $row3['media1'];

                          $base64_image = base64_encode($image_data);

                          echo '<br>' . '<img width="250"src="data:image/jpeg;base64,' .  $base64_image . '" /><br>';
                        }
                        echo                  '</div>' .
                          '</button>' .
                          '<div class="row">' .
                          '<div class="col-md-9 col-lg-9 start_0_ys"><p style="margin-top:20px;color:#FBA8B8;padding-left:15px;">' . $row['date_time'] . '</p></div>' .
                          '<div class="col-md-1 col-lg-1 start_0_ys">';
                        $like = "like" . $row['post_id'];
                        echo                      '<input type="checkbox" id="' . $like . '">' .

                          '<label for="' . $like . '">' .
                          '<!--<div class="lavel_like">-->' .
                          '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">' .
                          '<path
                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />' .
                          '</svg>　' . $row['fabulous'] . '　　　' .
                          '</label><!--終了ラベルタグ最初はコメントの場所も指定していたけどいいねのところだけ囲った-->' .
                          '</div>' .
                          '</form>' .
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
                      } else { //返信の場合
                        $sql3 = "SELECT reply.reply_id, reply.reply_subject, reply.user.id, reply.reply_contents, reply.date_time, reply.fabulous, reply.comments, reply.media1, reply.media2,
                                 user.user_id, user.user_name, user.email_address, user.password, user.media, user.self_introduction
                                 FROM reply INNER JOIN user ON reply.user_id = user.user_id WHERE reply.reply_id = ?";
                        $ps3 = $pdo->prepare($sql3);
                        $ps3->bindValue(1, $_POST['detail'], PDO::PARAM_STR);
                        $ps3->execute();
                        foreach ($ps3 as $row3) {
                          $subjectname = $row3['user_name'];
                        }
                        echo '<span style="margin-top:20px;color:#FBA8B8;padding-left:15px;">@'.$subjectname.'さんへ返信</span>';


                        //ゴミ箱
                        echo '<form action="trash.php" method="post">' .
                             '<button name="trash" type="hidden" value="' . $row['reply_id'] . '" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none; text-align:right;position: relative;top: -65px;left: 770px;">
                              <span class="material-symbols-outlined">delete</span></a>
                              </button>
                              </form>';

                        echo '<form action="08_投稿詳細画面.php" method="post">' .
                             '<button name="detail" type="hidden" value="' . $row['reply_id'] . '" style="text-decoration: none; background-color: transparent; border: none; outline: none; box-shadow: none; width: 870px; text-align:left;">' .
                             '<div style="font-size: 20px;">';
                        echo $row['reply_contents'];

                        //画像があるか検索
                        $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
                        $sql2 = "select * from reply where reply_id = ?";
                        $ps2 = $pdo->prepare($sql2);
                        $ps2->bindValue(1, $row['reply_id'], PDO::PARAM_INT);
                        $ps2->execute();
                        $row2 = $ps2->fetch(PDO::FETCH_ASSOC);

                        if (!empty($row2['media1'])) {
                          $image_data = $row2['media1'];

                          $base64_image = base64_encode($image_data);

                          echo '<br>' . '<img width="250"src="data:image/jpeg;base64,' .  $base64_image . '" /><br>';
                        }
                        echo                  '</div>' .
                          '</button>' .
                          '<div class="row">' .
                          '<div class="col-md-9 col-lg-9 start_0_ys"><p style="margin-top:20px;color:#FBA8B8;padding-left:15px;">' . $row['date_time'] . '</p></div>' .
                          '<div class="col-md-1 col-lg-1 start_0_ys">';
                        $like = "like" . $row['reply_id'];
                        echo '<input type="checkbox" id="' . $like . '">' .
                            '<label for="' . $like . '">' .
                            '<!--<div class="lavel_like">-->' .
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">' .
                            '<path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />' .
                            '</svg>　' . $row['fabulous'] . '　　　' .
                            '</label><!--終了ラベルタグ最初はコメントの場所も指定していたけどいいねのところだけ囲った-->' .
                            '</div>' .
                            '</form>' .
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
                      $reply_id = null;
                      $post_id = null;
                    }
                    ?>
                  </div>
                </div>
              </div>
              <!--↑投稿-->

            </div>

            <div id="iine" class="area">
              <div class="waku_ys">

                <div class="haikei_yp">
                  <div class="padding30_ys">
                    <div class="p_ys"><img class="image_middle" src="img/pink.png"> やまママにし<br><br>
                      <div style="font-size:20px;" onclick="location.href='08_投稿詳細画面.php'" value="投稿">
                        楽しい<br>
                        楽しい<br>
                        楽しい<br>
                      </div>
                      <div class="row">
                        <div class="col-md-9 col-lg-9 start_0_ys"></div>
                        <div class="col-md-1 col-lg-1 start_0_ys">
                          <input type="checkbox" id="like3">

                          <label for="like3">
                            <!--<div class="lavel_like">-->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                            </svg>　18　　　
                          </label>
                        </div>
                        <div class="col-md-2 col-lg-2 start_0_ys">
                          <a href="09_投稿返信画面.php" style="text-decoration: none;">
                            <img style="margin-left: 50px;" src="icon/コメント.svg">
                          </a>
                          　3　
                        </div>
                      </div>
                    </div>

                    <div class="p_ys"><img class="image_middle" src="img/pink.png"> やまママにし<br><br>
                      <div style="font-size:20px;" onclick="location.href='08_投稿詳細画面.php'" value="投稿">
                        楽しい<br>
                        楽しい<br>
                        a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>
                        <img src="img/やまったーlog.png" style="height: 200px;">
                      </div>
                      <div class="row">
                        <div class="col-md-9 col-lg-9 start_0_ys"></div>
                        <div class="col-md-1 col-lg-1 start_0_ys">
                          <input type="checkbox" id="like4">

                          <label for="like4">
                            <!--<div class="lavel_like">-->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                            </svg>　18　　　
                          </label><!--終了ラベルタグ最初はコメントの場所も指定していたけどいいねのところだけ囲った-->
                        </div>
                        <div class="col-md-2 col-lg-2 start_0_ys">
                          <a href="09_投稿返信画面.php" style="text-decoration: none;">
                            <img style="margin-left: 50px;" src="icon/コメント.svg">
                          </a>
                          　3　
                        </div>
                      </div>
                    </div>
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
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="sprict/yamanishi.js"></script>
  <script src="sprict/yamanisi_climb.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>