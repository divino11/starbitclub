<?php
session_start();
require_once '../db.php';
mysqli_set_charset($link, 'utf8');
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $sql = mysqli_query($link,'DELETE FROM `news` WHERE `id` = '.$_GET['del_id']);
    $sql = "SELECT * FROM `news` WHERE id = $id";
    mysqli_set_charset($link, 'utf8');
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    $img = $row['img'];
    unlink('../news-img/'.$img);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="../js/device.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <title>Админ-панель | Удалить новость</title>
</head>
<body>
<div class="reg-page">
    <?php require_once "../template/menu-admin.php"; ?>
</div>
<div class="form-reg">
    <div class="container">
        <img src="../img/benefits-logo.png" class="logo-reg" alt="">
        <div class="form-white-reg">
            <div class="admin-delete-post">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        $sql = "SELECT * FROM `news` ORDER BY id DESC";
                        mysqli_set_charset($link, 'utf8');
                        $result = mysqli_query($link, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $file = $row['img'];
                            $date = $row['date'];
                            $author = $row['author'];
                            ?>
                            <div class="row-posts">
                                <div class="col-post">
                                    <p class="title-post"><?php echo $title; ?></p>
                                </div>
                                <div class="col-post">
                                    <p class="author-post"><?php echo $author; ?></p>
                                </div>
                                <div class="col-post">
                                    <p class="date-post"><?php echo $date; ?></p>
                                </div>
                                <div class="col-post">
                                    <a href="?del_id=<?php echo $id;?>">Удалить</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
