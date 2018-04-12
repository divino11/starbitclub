<?php
session_start();
require_once 'db.php';
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
    <!-- Put this script tag to the <head> of your page -->
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?152"></script>
    <script type="text/javascript">
        VK.init({apiId: 6440159, onlyWidgets: true});
    </script>
    <link rel="stylesheet" href="css/style.css">
    <title>Отзывы о нас</title>
</head>
<body>
<style>
    #vk_comments {
        width: 100% !important;
        text-align: center;
    }
</style>
<div class="reg-page">
    <?php require_once "template/menu.php"; ?>
</div>
<div class="form-reg">
    <div class="container">
        <img src="img/logo-main-new.png" class="logo-reg" alt="">
        <div class="form-white-reg">
            <div class="review">
                <div id="vk_comments"></div>
                <script type="text/javascript">
                    VK.Widgets.Comments("vk_comments", {limit: 15, width: "600", attach: "*"});
                </script>
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
                <p class="copyright">&copy; 2017-2018 Bitcoin Stars - закрытый трейдерский клуб.<br>Все права защищены.
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
<!-- Begin Verbox {literal} -->
<script type='text/javascript'>
    (function(d, w, m) {
        window.supportAPIMethod = m;
        var s = d.createElement('script');
        s.type ='text/javascript'; s.id = 'supportScript'; s.charset = 'utf-8';
        s.async = true;
        var id = 'eb3fbf487bb730c0eaf618aa09867006';
        s.src = '//admin.verbox.ru/support/support.js?h='+id;
        var sc = d.getElementsByTagName('script')[0];
        w[m] = w[m] || function() { (w[m].q = w[m].q || []).push(arguments); };
        if (sc) sc.parentNode.insertBefore(s, sc);
        else d.documentElement.firstChild.appendChild(s);
    })(document, window, 'Verbox');
</script>
<!-- {/literal} End Verbox -->
<script data-skip-moving="true">
    (function(w,d,u){
        var s=d.createElement('script');s.async=1;s.src=u+'?'+(Date.now()/60000|0);
        var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    })(window,document,'https://cdn.bitrix24.ru/b6717263/crm/site_button/loader_1_e8zej7.js');
</script>
</body>
</html>
