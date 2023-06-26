<!DOCTYPE html>
<html>

<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <title>やまったー | ログイン</title>
  <style>
  </style>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="css/nakai.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <!--    <link href="css/yamane.css" rel="stylesheet" type="text/css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">  -->
  <link href="css/yamanishi.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

</head>

<body>
  <div class="mask">
    <div class="circle"></div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 col-lg-3"></div>
      <div class="col-md-6 col-lg-6">
        <img class="rogo_yamanisi" src="img/やまったーlog.png" alt="ロゴ">
        <div class="rogo_magin_120">
          <div class="text-line">
            <h5>ログイン</h5>
          </div>
        </div>

        <form action="login.php" method="post">

          <div class="magin30_yamanisi">
            <input type="email" class="form-control" name="email" required placeholder="メールアドレス" style="border-color:#FBA8B8;border-width:3px;">
          </div>

          <div class="magin30_yamanisi">

            <input type="password" class="form-control" name="password" required placeholder="パスワード" style="border-color:#FBA8B8;border-width:3px;"><br>
          </div>

          <?php
          session_start();
          if ((isset($_SESSION['error']))) {
            echo '<div style="color: red; text-align: center;">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
          }
          ?>

          <div class="magin20_yamanisi">
            <button type="submit" class="btn container-fluid color_white_yamani" style="background-color:#FBA8B8;">ログイン</button>
          </div>

        </form>

        <div class="rinku_yamanisi">
          <a class="a_ys" href="03_新規登録画面.php">→新規登録はこちら</a>
        </div>

      </div>

      <div class="col-md-3 col-lg-3"></div>
    </div>
  </div>

  <!--[メモ]ロゴのcssをこれ→position:absolute;に変更しようかなと思ってます-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>