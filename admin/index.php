<?php
require_once "../db.php";
session_start();
$query = 'SELECT * FROM `admin`';
$result = mysqli_query($link, $query); //ответ базы запишем в переменную $result
$user = mysqli_fetch_assoc($result); //преобразуем ответ из БД в нормальный массив PHP
$akcia_banner = $user['akcia_banner'];
$id = $user['id'];
if (isset($_POST['banner_on'])) {
    $banner = $_POST['banner'];
    $sql = "UPDATE `admin` SET akcia_banner = $banner WHERE id = $id";
    mysqli_query($link, $sql);
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
    <title>Админ-панель</title>
</head>
<body>
<div class="reg-page">
    <?php require_once "../template/menu-admin.php"; ?>
</div>
<div class="form-reg">
    <div class="container">
        <img src="../img/benefits-logo.png" class="logo-reg" alt="">
        <div class="form-white-reg">
            <div class="row">
                <div class="col-md-12">
                    <form action="index.php" method="post">
                        <select name="banner">
                            <option value="<?php echo $akcia_banner; ?>">Акционный баннер</option>
                            <option value="1">Включить баннер</option>
                            <option value="0">Отключить баннер</option>
                        </select>
                        <button class="banner_on" name="banner_on">Применить</button>
                    </form>
                </div>
            </div>
            <div class="admin-news">
                <div class="row">
                    <div class="col-md-4">
                        <a href="addPost" class="btn-success btn-post">Добавить новость</a>
                    </div>
                    <div class="col-md-4">
                        <a href="editPost" class="btn-primary btn-post">Редактировать новость</a>
                    </div>
                    <div class="col-md-4">
                        <a href="deletePost" class="btn-danger btn-post">Удалить новость</a>
                    </div>
                </div>
                <div class="admin-news">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="postToTelegram.php" class="btn-success btn-post">Публикация в телеграмм</a>
                        </div>
                        <div class="col-md-4">
                            <a href="viewMainPost.php" class="btn-primary btn-post">Отображение главной
                                новости\статьи</a>
                        </div>
                        <div class="col-md-4">
                            <!--<a href="deletePost" class="btn-danger btn-post">Удалить новость</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
