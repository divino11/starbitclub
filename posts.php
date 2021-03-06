<?php
session_start();
require_once 'db.php';
require 'functions.php';
mysqli_set_charset($link, 'utf8');
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.scrollbar.js"></script>
    <link rel="stylesheet" href="css/jquery.scrollbar.css">
    <script>
        jQuery(document).ready(function () {
            jQuery('body').scrollbar();
        });
    </script>
    <title>Новости</title>
    <style>
        body {
            margin: 0;
        }
    </style>
</head>
<body>
<div class="mobile_menu hidden-md hidden-lg">
    <?php require "template/mobileMenu.php"; ?>
</div>
<div class="reg-page">
    <?php require_once "template/menu.php"; ?>
</div>
<div class="form-reg">
    <div class="container">
        <div class="form-white-reg post-news">
            <div class="row">
                <div class="col-md-9">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#1" data-toggle="tab"><img class="tabsTopSwitch" src="img/news-icon.png">Новости</a></li>
                        <li><a href="#2" data-toggle="tab"><img class="tabsTopSwitch1" src="img/article.png">Статьи</a></li>
                    </ul>
                    <div class="tab-content ">
                        <div class="tab-pane active" id="1">
                            <?php
                            $sql = "SELECT * FROM `news` WHERE mainPost = '1' ORDER BY id DESC";
                            mysqli_set_charset($link, 'utf8');
                            $result = mysqli_query($link, $sql);
                            $row = mysqli_fetch_array($result);
                            $id = $row['id'];
                            $type = $row['type'];
                            $img = $row['img'];
                            $date = $row['date'];
                            $short_text = $row['short_text'];
                            $categorys = $row['category'];
                            $title = $row['title'];
                            $categorys = explode(", ", $categorys);
                            ?>
                            <div class="col-md-12">
                                <div class="img__main">
                                    <a href="/post?id=<?php echo $id; ?>"><img src="/news-img/<?php echo $img; ?>"
                                                                               class="img-news"></a><br>
                                    <p class="centered"><a href="/post?id=<?php echo $id; ?>"
                                                           class="title-news"><?php echo $title; ?></a></p>
                                    <p class="date-news"><img src="img/clock-icon.png" alt=""><?php whatIsDatePosted($date); ?></p>
                                    <p class="type-news"><img src="img/news-icon.png" alt=""><?php echo $type; ?></p>
                                    <p class="shorttext"><?php echo $short_text; ?></p>
                                    <!--<div class="categorys">
                                        <?php /*foreach ($categorys as $category) { */?>
                                            <span class="category"><?php /*echo $category; */?></span>
                                        <?php /*} */?>
                                    </div>-->
                                    <img src="/news-img/<?php echo $img; ?>" class="img__overlay" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="2">
                            <?php
                            $sql = "SELECT * FROM `article` WHERE mainPost = '1' ORDER BY id DESC";
                            mysqli_set_charset($link, 'utf8');
                            $result = mysqli_query($link, $sql);
                            $row = mysqli_fetch_array($result);
                            $id = $row['id'];
                            $type = $row['type'];
                            $img = $row['img'];
                            $date = $row['date'];
                            $categorys = $row['category'];
                            $short_text = $row['short_text'];
                            $title = $row['title'];
                            $categorys = explode(", ", $categorys);
                            ?>
                            <div class="col-md-12">
                                <div class="img__main">
                                    <a href="/article?id=<?php echo $id; ?>"><img src="/news-img/<?php echo $img; ?>"
                                                                               class="img-news"></a><br>
                                    <p class="centered"><a href="/article?id=<?php echo $id; ?>"
                                                           class="title-news"><?php echo $title; ?></a></p>
                                    <p class="date-news"><img src="img/clock-icon.png" alt=""><?php whatIsDatePosted($date); ?></p>
                                    <p class="type-news"><img src="img/article.png" alt=""><?php echo $type; ?></p>
                                    <p class="shorttext"><?php echo $short_text; ?></p>
                                    <!--<div class="categorys">
                                        <?php /*foreach ($categorys as $category) { */?>
                                            <span class="category"><?php /*echo $category; */?></span>
                                        <?php /*} */?>
                                    </div>-->
                                    <img src="/news-img/<?php echo $img; ?>" class="img__overlay" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#hot1" data-toggle="tab"><img class="tabsHotSwitch" src="img/hot-post.png">Горячее</a></li>
                        <li><a href="#hot2" data-toggle="tab"><img class="tabsHotSwitch1" src="img/clock-icon.png">Свежее</a></li>
                    </ul>

                    <div class="tab-content ">
                        <div class="tab-pane active" id="hot1">
                            <?php
                            $sql = "SELECT * FROM `news` ORDER BY id DESC LIMIT 10";
                            mysqli_set_charset($link, 'utf8');
                            $result = mysqli_query($link, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                $id = $row['id'];
                                $img = $row['img'];
                                $type = $row['type'];
                                $date = $row['date'];
                                $short_text = $row['short_text'];
                                $title = $row['title'];
                                ?>
                                <div class="col-md-12 hotPosts">
                                    <a href="/post?id=<?php echo $id; ?>"
                                       class="title__news-second"><?php echo $title; ?></a>
                                    <p class="date__news-hot"><img src="img/clock-icon.png" alt=""><?php whatIsDatePosted($date); ?></p>
                                    <p class="type-news-hot"><img src="img/article.png" alt=""><?php echo $type; ?></p>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="tab-pane" id="hot2">
                            <?php
                            $sql = "SELECT * FROM `article` ORDER BY id DESC LIMIT 5";
                            mysqli_set_charset($link, 'utf8');
                            $result = mysqli_query($link, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                $id = $row['id'];
                                $img = $row['img'];
                                $type = $row['type'];
                                $date = $row['date'];
                                $short_text = $row['short_text'];
                                $title = $row['title'];
                                ?>
                                <div class="col-md-12 hotPosts">
                                    <a href="/article?id=<?php echo $id; ?>"
                                       class="title__news-hot"><?php echo $title; ?></a>
                                    <br>
                                    <span class="date__news-hot"><img src="img/clock-icon.png" alt=""><?php whatIsDatePosted($date); ?></span>
                                    <span class="type-news-hot"><img src="img/article.png" alt=""><?php echo $type; ?></span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
                $sql = "SELECT * FROM `article` WHERE mainPost = '0' ORDER BY id DESC";
                mysqli_set_charset($link, 'utf8');
                $result = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['id'];
                    $img = $row['img'];
                    $type = $row['type'];
                    $date = $row['date'];
                    $short_text = $row['short_text'];
                    $title = $row['title'];
                    ?>
                    <div class="col-md-4">
                        <div class="wrapper_img">
                            <div class="allPost-overlay"></div>
                        <a href="/article?id=<?php echo $id; ?>"><img src="/news-img/<?php echo $img; ?>"
                                                                      class="img__news-second"></a></div><br>
                        <p class="centered"><a href="/article?id=<?php echo $id; ?>"
                                               class="title__news-second"><?php echo $title; ?></a></p>
                        <p class="date__news-second"><img src="img/clock-icon.png" alt=""><?php whatIsDatePosted($date); ?></p>
                        <p class="type-news-other"><img src="img/article.png" alt=""><?php echo $type; ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>
<div class="footer-reg footer-second centered">
    <div class="container">
        <div class="row">
            <div class="col-md-4 politic">
                <a href="">Политика конфиденциальности</a>
            </div>
            <div class="col-md-4">
                <p>Телефон горячей линии</p>
                <p><a href="tel:88005553535">+8 (800) 555-35-35</a></p>
                <p class="copyright">&copy; 2017-2018 StarBitClub - закрытый трейдерский клуб.<br>Все права защищены.
                </p>
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
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117114324-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-117114324-1');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter48373727 = new Ya.Metrika({
                    id: 48373727,
                    clickmap: true,
                    trackLinks: true,
                    accurateTrackBounce: true,
                    webvisor: true
                });
            } catch (e) {
            }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () {
                n.parentNode.insertBefore(s, n);
            };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/48373727" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->
<script data-skip-moving="true">
    (function (w, d, u) {
        var s = d.createElement('script');
        s.async = 1;
        s.src = u + '?' + (Date.now() / 60000 | 0);
        var h = d.getElementsByTagName('script')[0];
        h.parentNode.insertBefore(s, h);
    })(window, document, 'https://cdn.bitrix24.ru/b6766487/crm/site_button/loader_2_7nsjuk.js');
</script>
<script>
    $(document).ready(function () {
        $('.mobile_menu').click(function(){
            $(".mobile_menu ul").slideToggle( "slow");
        });
    });
</script>
</body>
</html>
