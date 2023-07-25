<?php 
session_start();
$_SESSION = array();
session_destroy();
unset($_SESSION['user']['id']);
?>
<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>やまったー | トップ</title>
<style>
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="css/nakai.css" rel="stylesheet" type="text/css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
<link href="css/yamane.css" rel="stylesheet" type="text/css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
<link href="css/yamanisi.css" rel="stylesheet" type="text/css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
</head>

<body id="topanime" background="img/pink.png">
<div>
<p style="position: fixed;z-index: 10;text-align:center;">--このサイトは画面が1280*800じゃないと綺麗に映りません。デベロッパーツールや開発者ツールを駆使して楽しんでね！--</p>
    <a href="session_check.php">
      <div>
        <img src="img/やまったーlog.png" style="width: 1000px; margin-left: 130px; margin-top: 40px;">
      </div>
    </a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
  <script src="./script/script.js"></script>   
</body>
</html>