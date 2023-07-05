<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>やまったー | 新規投稿作成</title>
    <style>
        label {
            padding: 10px 40px;
            color: #FBA8B8;
            background-color: #fff;
            cursor: pointer;
        }

        input[type="file"] {
            display: none;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="css/nakai.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <!--    <link href="css/yamane.css" rel="stylesheet" type="text/css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">  -->
    <link href="css/yamanishi.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

</head>
<style></style>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-3 back_pink_ys"></div>

            <div class="col-md-6 col-lg-6 start_0_ys">
                <div class="magin-sayu-ys  magin40_yamanisi">

                    <button type="button" class="btn container-fluid color_white_yamani" style=" width: 130px;height: 40px;background: #FBA8B8;" onclick="history.back()">キャンセル</button>

                    <form method="POST" action="new_reply.php">

                        <div class="touroku_ys">
                            <button type="hidden" name="newreply" value="<?php echo $_POST['reply']; ?>"
                                    class="btn container-fluid color_white_yamani" style=" width: 130px;height: 40px;background: #FBA8B8; margin-left:-35px;">返信する</button>
                        </div>

                        <img class="image_middle magin20_yamanisi" src="img/pink.png">
                        <h5 style="position: relative;top:-50px;left:100px;"><?php echo $_SESSION['user']['name']; ?></h5>


                        <textarea name="replyctt" class="form-control alert-light toukou_bokku_ys" id="txt1" maxlength="300" required placeholder="｜返信内容"></textarea><br>
                        <!--   <a class="a1_ys">メディアを選択</a><br>-->


                        <label>
                            <input type="file" onchange="preview(this)" multiple>メディアを選択
                            <div class="preview-area"></div>

                            <script>
                                function preview(elem, output = '') {
                                    Array.from(elem.files).map((file) => {
                                        const blobUrl = window.URL.createObjectURL(file)
                                        output += `<img src=${blobUrl}>`
                                    })
                                    elem.nextElementSibling.innerHTML = output
                                }
                            </script>
                        </label>
                    </form>
                </div>
            </div>

            <div class="col-md-3 col-lg-3 back_pink_ys"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>