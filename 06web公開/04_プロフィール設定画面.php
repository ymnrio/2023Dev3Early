<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>やまったー | プロフィール設定</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="css/nakai.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <!--<link href="css/yamane.css" rel="stylesheet" type="text/css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">-->
  <link href="css/yamanishi.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <style>
    input[type="file"] {
      display: none;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 back_pink_yamani" style="height:100vh"></div>

      <div class="col-md-6">

      <form method="POST"action="new_profile.php"enctype="multipart/form-data">

        <div class="row">
          <div class="col-md-5"></div>
          <div class="col-md-1">
            <img class="image_middle" src="img/pink.png" style="margin-top:25px; ">

            <label class="btn container-fluid color_white_yamani aikn_ys start_0_ys border border-dark">
              <input type="file" accept="image/*"name="file">
              <p class="p_pusu_ys">＋</p>
            </label>

          </div>
          <div class="col-md-6 usiro_ys">
            <p style="margin-left:30px;margin-top: 45px;">

          <?php   //名前表示
          $pdo = new PDO('mysql:host=mysql217.phy.lolipop.lan;dbname=LAA1417495-yamatter;charset=utf8', 'LAA1417495', 'sotA1140');
          $sql="select user_name from user where user_id = ?";
          $ps=$pdo->prepare($sql);
          $ps->bindValue(1,$_SESSION['user_id'],PDO::PARAM_STR);
          $ps->execute();
          foreach($ps as $row){
            echo $row['user_name'];
          }
          ?>

          </p>
          </div>

        </div>

        <textarea class="sayu_ys form-control alert-light magin40_yamanisi"
          style="height: 30px;width: 90%;text-align:left;border:none;overflow-wrap: break-word;margin-top: 70px;"
          id="txt1" maxlength="200" placeholder="自己紹介" name="jikosyoukai"></textarea>
        <hr class="sayu_ys">
        <div style="text-align: right;margin-right: 30px;">
          <p>200文字</p>
        </div>
        <hr class="line" id="hr_nh">
        <div class="text-line" style="margin-bottom: 20px;">
          <p>好きなジャンル</p>
        </div>

        <div class="example3">
          <input type="checkbox" id="1" name="like_genre[]" value="1"><label for="1">すべて</label>
          <input type="checkbox" id="2" name="like_genre[]" value="2"><label for="2">JPOP</label>
          <input type="checkbox" id="3" name="like_genre[]" value="3"><label for="3">洋楽</label>
          <input type="checkbox" id="4" name="like_genre[]" value="4"><label for="4">アニソン</label>
        </div>
        <div class="example3">
          <input type="checkbox" id="5" name="like_genre[]" value="5"><label for="5">クラシック</label>
          <input type="checkbox" id="6" name="like_genre[]" value="6"><label for="6">ロック</label>
          <input type="checkbox" id="7" name="like_genre[]" value="7"><label for="7">VOCALOID</label>
          <input type="checkbox" id="8" name="like_genre[]" value="8"><label for="8">ギター</label>
        </div>
        <div class="example3">
          <input type="checkbox" id="9" name="like_genre[]" value="9"><label for="9">楽器</label>
          <input type="checkbox" id="10" name="like_genre[]" value="10"><label for="10">その他</label>
         
        </div>


        <div class="btn-group" data-toggle="buttons">

        </div>
        <button onclick="location.href='07_ジャンル別投稿一覧画面.php'" class="btn container-fluid color_white_yamani "
          style="margin-top: 60px;background-color:#FBA8B8;width: 90%;margin-left: 30px;">登録</button>

        <div style="text-align: right;margin-top: 25px;">
          <a class="skip_nh" href="07_ジャンル別投稿一覧画面.php" style="margin-right: 30px;">→スキップ</a>
        </div>
      </form>
      </div>
      <div class="col-md-3 back_pink_yamani"></div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="sprict/yamanishi.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="sprict/yamanishi.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>