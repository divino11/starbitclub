<?php
session_start();
require_once '../db.php';
mysqli_set_charset($link, 'utf8');
if (isset($_POST['streamTelegramNews'])) {
    $id_post = $_POST['id_post'];
    $telegram = $_POST['checkTelegram'];
    mysqli_query($link, "UPDATE `news` SET share_telegram = $telegram WHERE id = $id_post");
    $sql = "SELECT * FROM `news` WHERE id = $id_post";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $title = $row['title'];
        $img = "https://starbitclub.com/news-img/" . $row['img'];
        $short_text = $row['short_text'];
        $link = '<a href="https://starbitclub.com/post?id=' . $id_post . '">Подробнее</a>';
    }
    file_get_contents("https://api.telegram.org/bot478008139:AAEHhCAL5Aau6whEw6FQqZGlg_t4gWFGE5E/sendPhoto?chat_id=-1001320307944&photo=$img&caption=$short_text \n $link&parse_mode=html");
}
if (isset($_POST['streamTelegramArticle'])) {
    $id_post = $_POST['id_post'];
    $telegram = $_POST['checkTelegram'];
    mysqli_query($link, "UPDATE `article` SET share_telegram = $telegram WHERE id = $id_post");
    $sql = "SELECT * FROM `article` WHERE id = $id_post";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $title = $row['title'];
        $img = "https://starbitclub.com/news-img/" . $row['img'];
        $short_text = $row['short_text'];
        $link = '<a href="https://starbitclub.com/article?id=' . $id_post . '">Подробнее</a>';
    }
    file_get_contents("https://api.telegram.org/bot478008139:AAEHhCAL5Aau6whEw6FQqZGlg_t4gWFGE5E/sendPhoto?chat_id=-1001320307944&photo=$img&caption=$short_text \n $link&parse_mode=html");
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
    <title>Админ-панель | Опубликовать в телеграмм</title>
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
                        <p class="titleEditPost">Добавление в телеграм НОВОСТИ</p>
                        <?php
                        $sql = "SELECT * FROM `news` ORDER BY id DESC LIMIT 10";
                        mysqli_set_charset($link, 'utf8');
                        $result = mysqli_query($link, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $date = $row['date'];
                            $author = $row['author'];
                            $share_telegram = $row['share_telegram'];
                            ?>
                            <div class="row-posts">
                                <form action="editPost.php" method="post">
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
                                               name="checkTelegram"
                                               value="1" <?php if ($share_telegram > 0) echo 'checked'; ?>
                                               class="shareTelegram-post">
                                    </div>
                                    <div class="col-post">
                                        <button name="streamTelegramNews" class="streamTelegram">Опубликовать</button>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="titleEditPost">Добавление в телеграм СТАТЬИ</p>
                        <?php
                        $sql = "SELECT * FROM `article` ORDER BY id DESC LIMIT 5";
                        mysqli_set_charset($link, 'utf8');
                        $result = mysqli_query($link, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $date = $row['date'];
                            $author = $row['author'];
                            $share_telegram = $row['share_telegram'];
                            ?>
                            <div class="row-posts">
                                <form action="editPost.php" method="post">
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
                                               name="checkTelegram"
                                               value="1" <?php if ($share_telegram > 0) echo 'checked'; ?>
                                               class="shareTelegram-post">
                                    </div>
                                    <div class="col-post">
                                        <button name="streamTelegramArticle" class="streamTelegram">Опубликовать</button>
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
