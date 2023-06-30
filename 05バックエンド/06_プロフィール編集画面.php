<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>やまったー | プロフィール編集画面</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="css/nakai.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <!--    <link href="css/yamane.css" rel="stylesheet" type="text/css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">   -->
  <link href="css/yamanishi.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <style>
    input[type="file"] {
      display: none;
    }
  </style>
</head>

<body>
  <form action="profile_update.php" method="post">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 back_pink_yamani" style="height:100vh"></div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-1">
              <img class="image_middle" src="img/pink.png" style="margin-top:25px; ">

              <label class="btn container-fluid color_white_yamani aikn_ys start_0_ys border border-dark">
                <input type="file" name="iconimg" accept="image/*">
                <p class="p_pusu_ys">＋</p>
              </label>

            </div>
            <div class="col-md-6 usiro_ys">
              <!--<p style="margin-left:30px;margin-top: 45px;"><?php //echo $_SESSION['user']['name'] ?></p>-->
            </div>
          </div><br>
            <p  style="margin-left: 30px;">名前</p>
            <input type="text" class="form-control" name="username" required
              value="<?php echo $_SESSION['user']['name']; ?>"style="width:570px; margin: 0 auto; border-color:#FBA8B8;border-width:3px;">
          
          <textarea class="sayu_ys form-control alert-light magin40_yamanisi " style="width: 90%;height: 30px;text-align:left;border:none;overflow-wrap: break-word;margin-top: 70px;" 
          name="introduction" id="txt1" maxlength="200" placeholder="自己紹介"></textarea>
          <hr class="sayu_ys">
          <div style="text-align: right;margin-right: 30px;">
            <p>200文字</p>
          </div>
          <hr class="line" id="hr_nh">
          <div class="text-line " style="margin-bottom: 20px;">
            <p>好きなジャンル</p>
          </div>

          <div class="example3">
            <input type="checkbox" id="1" name="example2[]" value="1"><label for="1">すべて</label>
            <input type="checkbox" id="2" name="example2[]" value="2"><label for="2">JPOP</label>
            <input type="checkbox" id="3" name="example2[]" value="3"><label for="3">洋楽</label>
            <input type="checkbox" id="4" name="example2[]" value="4"><label for="4">アニソン</label><br>
          </div>
          <div class="example3">
            <input type="checkbox" id="5" name="example2[]" value="5"><label for="5">クラシック</label>
            <input type="checkbox" id="6" name="example2[]" value="6"><label for="6">ロック</label>
            <input type="checkbox" id="7" name="example2[]" value="7"><label for="7">VOCALOID</label>
            <input type="checkbox" id="8" name="example2[]" value="8"><label for="8">ギター</label>
          </div>
          <div class="example3">
            <input type="checkbox" id="9" name="example2[]" value="9"><label for="9">楽器</label>
            <input type="checkbox" id="10" name="example2[]" value="10"><label for="10">その他</label>

          </div>


          <div class="btn-group" data-toggle="buttons">

          </div>
          <div class="row magin40_yamanisi">
            <div class="col-md-6" id="btn_nh">
              <!--<div class="col-md-3" id="btn_nh">-->
              <button onclick="location.href='05_プロフィール画面.php'" class="btn container-fluid color_white_yamani" style="background-color:#FBA8B8;width: 90%;margin-left: 30px;">キャンセル</button>
            </div>
            <div class="col-md-6" id="btn_nh">
              <button value="保存" name="update" type="submit" class="btn container-fluid color_white_yamani" style="background-color:#FBA8B8;width: 90%;margin-right: 30px;">保存</button>
            </div>
          </div>
        </div>
        <div class="col-md-3" style="background-color:#FBA8B8;"></div>
      </div>
    </div>
  </form>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="sprict/yamanishi.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="sprict/yamanishi.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>