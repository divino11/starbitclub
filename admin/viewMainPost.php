<?php
session_start();
require_once '../db.php';
mysqli_set_charset($link, 'utf8');
if (isset($_POST['selectMainNews'])) {
    mysqli_query($link, "UPDATE `news` SET mainPost = '0'");
    $id_post = $_POST['id_post'];
    $telegram = $_POST['setMainPost'];
    mysqli_query($link, "UPDATE `news` SET mainPost = '1' WHERE id = $id_post");
}
if (isset($_POST['selectMainArticle'])) {
    mysqli_query($link, "UPDATE `article` SET mainPost = '0'");
    $id_post = $_POST['id_post'];
    $telegram = $_POST['setMainPost'];
    mysqli_query($link, "UPDATE `article` SET mainPost = '1' WHERE id = $id_post");
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
    <title>Админ-панель | Выбрать главную новость</title>
</head>
<body>
<div class="reg-page">
    <?php require_once "../template/menu-admin.php"; ?>
</div>
<div class="form-reg">
    <div class="container">
        <img src="../img/benefits-logo.png" class="logo-reg" alt="">
        <div class="form-white-reg">
            <div class="admin-edit-post">
                <div class="row">
                    <div class="col-md-12">
                        <p class="titleEditPost">Выбор главной НОВОСТИ</p>
                        <?php
                        $sql1 = "SELECT * FROM `news` ORDER BY id DESC LIMIT 10";
                        mysqli_set_charset($link, 'utf8');
                        $result = mysqli_query($link, $sql1);
                        while ($row1 = mysqli_fetch_array($result)) {
                            $id = $row1['id'];
                            $title = $row1['title'];
                            $date = $row1['date'];
                            $author = $row1['author'];
                            $mainPost = $row1['mainPost'];
                            ?>
                            <div class="row-posts">
                                <form action="viewMainPost.php" method="post">
                                    <div class="col-post">
                                        <input class="id-post" name="id_post" value="<?php echo $id; ?>">
                                    </div>
                                    <div class="col-post">
                                        <p class="title-post"><?php echo $title; ?></p>
                                    </div>
                                    <div class="col-post">
                                        <p class="date-post"><?php echo $date; ?></p>
                                    </div>
                                    <div class="col-post">
                                        <input type="checkbox"
                                               name="setMainPost"
                                               value="1" <?php if ($mainPost > 0) echo 'checked'; ?>
                                               class="shareTelegram-post">
                                    </div>
                                    <div class="col-post">
                                        <button name="selectMainNews" class="streamTelegram">Выбрать</button>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-12">
                        <p class="titleEditPost">Выбор главной СТАТЬИ</p>
                        <?php
                        $sql1 = "SELECT * FROM `article` ORDER BY id DESC LIMIT 10";
                        mysqli_set_charset($link, 'utf8');
                        $result = mysqli_query($link, $sql1);
                        while ($row1 = mysqli_fetch_array($result)) {
                            $id = $row1['id'];
                            $title = $row1['title'];
                            $date = $row1['date'];
                            $author = $row1['author'];
                            $mainPost = $row1['mainPost'];
                            ?>
                            <div class="row-posts">
                                <form action="viewMainPost.php" method="post">
                                    <div class="col-post">
                                        <input class="id-post" name="id_post" value="<?php echo $id; ?>">
                                    </div>
                                    <div class="col-post">
                                        <p class="title-post"><?php echo $title; ?></p>
                                    </div>
                                    <div class="col-post">
                                        <p class="date-post"><?php echo $date; ?></p>
                                    </div>
                                    <div class="col-post">
                                        <input type="checkbox"
                                               name="setMainPost"
                                               value="1" <?php if ($mainPost > 0) echo 'checked'; ?>
                                               class="shareTelegram-post">
                                    </div>
                                    <div class="col-post">
                                        <button name="selectMainArticle" class="streamTelegram">Выбрать</button>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
