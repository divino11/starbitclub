<?php
session_start();
require_once "db.php";
header('Content-Type: text/html; charset=utf-8');
mysqli_set_charset($link, 'utf8');
$id = $_GET['id'];
$sql = "SELECT * FROM `news` WHERE id = $id";
mysqli_set_charset($link, 'utf8');
$result = mysqli_query($link, $sql);
while ($row = mysqli_fetch_array($result)) {
    $title = $row['title'];
    $img = $row['img'];
    $text = $row['text'];
    $date = $row['date'];
    $author = $row['author'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    body {
        margin: 0;
    }
</style>
<body>
<div class="reg-page">
    <?php require_once "template/menu.php"; ?>
</div>
<div class="form-reg">
    <div class="container">
        <div class="form-white-reg">
            <div class="row">
                <div class="col-md-9">
                    <a class="to-back" href="/lk">Назад</a>
                    <img src="/news-img/<?php echo $img; ?>" class="news-img">
                    <p class="news-date"><?php echo $date; ?></p>
                    <p class="news-author"><?php echo $author; ?></p>
                    <p class="news-title"><?php echo $title; ?></p>
                    <p class="news-text"><?php echo $text; ?></p>
                    <div id="mc-container"></div>
                    <script type="text/javascript">
                        cackle_widget = window.cackle_widget || [];
                        cackle_widget.push({widget: 'Comment', id: 58490});
                        (function() {
                            var mc = document.createElement('script');
                            mc.type = 'text/javascript';
                            mc.async = true;
                            mc.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cackle.me/widget.js';
                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mc, s.nextSibling);
                        })();
                    </script>
                    <a id="mc-link" href="http://cackle.me">Комментарии для сайта <b style="color:#4FA3DA">Cackl</b><b style="color:#F65077">e</b></a>
                </div>
                <div class="col-md-3 related-news">
                    <p class="title-related-news">Похожие новости</p>
                    <?php
                    $sql = "SELECT * FROM `news` ORDER BY id DESC";
                    mysqli_set_charset($link, 'utf8');
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $title = $row['title'];
                        $img = $row['img'];
                        $date = $row['date'];
                        ?>
                        <div class="col-md-12">
                            <a href="/news?id=<?php echo $id; ?>"><img src="/news-img/<?php echo $img; ?>"
                                                                       class="img-news"></a><br>
                            <a href="/news?id=<?php echo $id; ?>"
                                                   class="title-news"><?php echo $title; ?></a>
                            <p class="date-post"><?php echo $date; ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-reg centered">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="">Политика конфиденциальности</a>
            </div>
            <div class="col-md-4">
                <p>Телефон горячей линии</p>
                <p><a href="tel:88005553535">+8 (800) 555-35-35</a></p>
                <p class="copyright">&copy; 2017-2018 StarBitClub - закрытый трейдерский клуб.<br>Все права защищены.</p>
            </div>
            <div class="col-md-4 col-money">
                <ul>
                    <li><img src="img/visa.png" alt=""></li>
                    <li><img src="img/mastercard.png" alt=""></li>
                    <li><img src="img/qiwi.png" alt=""></li>
                    <li><img src="img/yandex.png" alt=""></li>
                </ul>
                <p><a href="#">Пользовательское соглашение</a></p>
            </div>
        </div>
    </div>
</div>

<?php require_once "template/login_popup.php"; ?>
</body>
</html>
<?php } ?>