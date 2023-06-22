<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>やまったー | 投稿詳細</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="css/nakai.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <link href="css/yamane.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <link href="css/yamanishi.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

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
          <input type="radio" id="1" name="example3" onclick="location.href='07_ジャンル別投稿一覧画面.php'" value="すべて"><label for="1">　♪ すべて</label>
          <input type="radio" id="2" name="example3" onclick="location.href='07_ジャンル別投稿一覧画面.php'" value="JPOP"><label for="2">　♪ JPOP</label>
          <input type="radio" id="3" name="example3" onclick="location.href='07_ジャンル別投稿一覧画面.php'" value="洋楽"><label for="3">　♪ 洋楽</label>
          <input type="radio" id="4" name="example3" onclick="location.href='07_ジャンル別投稿一覧画面.php'" value="アニソン"><label for="4">　♪ アニソン</label>
          <input type="radio" id="5" name="example3" onclick="location.href='07_ジャンル別投稿一覧画面.php'" value="クラシック"><label for="5">　♪ クラシック</label>
          <input type="radio" id="6" name="example3" onclick="location.href='07_ジャンル別投稿一覧画面.php'" value="ロック"><label for="6">　♪ ロック</label>
          <input type="radio" id="7" name="example3" onclick="location.href='07_ジャンル別投稿一覧画面.php'" value="VOCALOID"><label for="7">　♪ VOCALOID</label>
          <input type="radio" id="8" name="example3" onclick="location.href='07_ジャンル別投稿一覧画面.php'" value="ギター"><label for="8">　♪ ギター</label>
          <input type="radio" id="9" name="example3" onclick="location.href='07_ジャンル別投稿一覧画面.php'" value="楽器"><label for="9">　♪ 楽器</label>
          <input type="radio" id="10" name="example3" onclick="location.href='07_ジャンル別投稿一覧画面.php'" value="その他"><label style="margin-bottom: -10px;" for="10">　♪ その他</label><br>

          <hr class="start_0_ys color_yamani"><br>
          <input type="radio"  id="11" name="example3" onclick="location.href='06_プロフィール編集画面.php'" value="遷移"><label class="nabi_ys" style="margin-bottom: 5px;" for="11">　プロフィール</gita-></label>
          <hr class="start_0_ys color_yamani"><br>
          <input type="radio" id="12" name="example3" onclick="location.href='01_トップ画面.php'" value="遷移"><label class="nabi_ys" for="12">　ログアウト</gita-></label>
        </div>
      </div>
      <div class="col-md-9 col-lg-9 back_pink_yamani start_0_ys" style="border-left:1px solid #c8c8c8;">

        <div class="row">
          <div class="col-md-12 col-lg-12" style="height: 100vh;">

            <button type="button"
              class="btn container-fluid  magin30_yamanisi color_white_yamani border border-light syousai_do_ys"
              style="margin-left: 3%;width: 150px;" onclick="location.href='07_ジャンル別投稿一覧画面.php'" value="遷移">戻る</button>

            <button type="button"
              class="btn container-fluid  magin30_yamanisi color_white_yamani border border-light syousai_do_ys"
              style="width: 150px;margin-left: 62%;" onclick="location.href='09_投稿返信画面.php'" value="投稿">返信する</button>

            <div class="waku_ys">

              <div class="haikei_yp">
                <div class="padding30_ys">
                  <div style="margin-bottom: 50px;">
                    <div class="p_ys"><img class="image_middle" src="img/pink.png">　やまママにし<br><br>
                      <div style="font-size: 20px;">
                        ギター楽しい<br>
                        ギター楽しい<br>
                        ギター楽しい<br><!--初心者が一番楽しい-->
                      </div>
                      <div class="row">
                        <div class="col-md-9 col-lg-9 start_0_ys"></div>
                        <div class="col-md-1 col-lg-1 start_0_ys">
                          <input type="checkbox" id="like1">

                          <label for="like1">
                            <!--<div class="lavel_like">-->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
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
              <!--⇩返信-->
              <div class="hensin_waku_ys">
                <div class="haikei_yp">
                  <div class="padding30_ys">
                    <div class="p_he_ys">
                      <img class="image_middle" src="img/pink.png"> やまママにし<br><br>
                      <div style="font-size: 18px;" onclick="location.href='08_投稿詳細画面.php'" value="投稿">
                        ギター楽しい<br>
                        ギター楽しい<br>
                        ギター楽しい<br>
                      </div>
                      <div class="row">
                        <div class="col-md-9 col-lg-9 start_0_ys"></div>
                        <div class="col-md-1 col-lg-1 start_0_ys">
                          <input type="checkbox" id="like2">

                          <label for="like2">
                            <!--<div class="lavel_like">-->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
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
                <div class="haikei_yp">
                  <div class="padding30_ys">
                    <div class="p_he_ys">
                      <img class="image_middle" src="img/pink.png"> やまママにし<br><br>
                      <div style="font-size: 18px;" onclick="location.href='08_投稿詳細画面.php'" value="投稿">
                        ギター楽しい<br>
                        ギター楽しい<br>
                        ギター楽しい<br>
                      </div>
                      <div class="row">
                        <div class="col-md-9 col-lg-9 start_0_ys"></div>
                        <div class="col-md-1 col-lg-1 start_0_ys">
                          <input type="checkbox" id="like3">

                          <label for="like3">
                            <!--<div class="lavel_like">-->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
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
            </div>
          </div>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="sprict/yamanishi.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>