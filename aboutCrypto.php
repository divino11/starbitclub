<?php
session_start();
require_once "db.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <title>Торговые сигналы криптовалют - трейдерский клуб BITCOIN STARS</title>
    <meta name="Description"
          content="Доступ к закрытым источникам анализа и сигналов рынка на покупку и продажу криптовалют: точки входа, выхода, пампы. Автоматизация и формирование инвестиционного портфеля. Большая команда трейдеров и аналитиков."/>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/device.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="js/jquery.spincrement.min.js"></script>
    <script src="js/fontawesome-all.js"></script>
    <script src="js/wow.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css"
          integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/line.css">
    <script>
        new WOW().init();
    </script>
    <script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = 'https://vk.com/rtrg?p=VK-RTRG-233187-c8HpL';</script>
    <!— Facebook Pixel Code —>
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1642039612539374');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1"
             src="https://www.facebook.com/tr?id=1642039612539374&ev=PageView
&noscript=1"/>
    </noscript>
    <!— End Facebook Pixel Code —>
</head>
<body>
<script>
    /*$(document).ready(function () {
        setInterval(function () {
            if (device.tablet() || device.mobile()) {
                if (device.portrait()) {
                    $(".container").css("display", "none");
                    //alert('Пожалуйста, переверните Ваш девайс в горизонтальное положение для наилучшего отображения контента');
                    $("#device_rotate").html('<div class="modal fade" style="display:block; opacity: 1;">\n' +
                        '    <div class="modal-rotate">\n' +
                        '        <div class="modal-dialog">\n' +
                        '            <div class="modal-content">\n' +
                        '                <button class="close" data-dismiss="modal">×</button>\n' +
                        '                <div class="modal-body">\n' +
                        '                    <p class="title-rotate">Пожалуйста, переверните Ваш девайс в горизонтальное положение для наилучшего отображения контента</p>\n' +
                        '                    <img src="img/rotate.gif" class="icon-rotate" alt="">\n' +
                        '                </div>\n' +
                        '            </div>\n' +
                        '        </div>\n' +
                        '    </div>\n' +
                        '</div>');
                } else {
                    $("#device_rotate .modal").hide();
                    $(".container").show();
                }
            }
        }, 1000)
    });*/
</script>
<div id="device_rotate"></div>
<div class="my-menu hidden-md hidden-lg" style="display:none;">
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <a href="/"><img class="logo-menu" src="img/logo-new.png" alt="logo menu"></a>
            </div>
            <div class="col-md-9 col-menu centered">
                <ul>
                    <li><a href="/" class="menu-point">Главная</a></li>
                    <li><a href="/review">Отзывы</a></li>
                    <li><a href="/posts">Новости</a></li>
                    <li><a href="/registration">Присоединится</a></li>
                    <?php if (isset($_SESSION['id'])) {
                        $id_ses = $_SESSION['id']; ?>
                        <li>
                            <a class="gradient-menu" href="lk"><img
                                        class="menu-people" src="img/people-menu.png" alt="">Войти
                                в кабинет
                            </a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a data-toggle="modal" data-target="#myModal" class="gradient-menu"><img
                                        class="menu-people" src="img/people-menu.png" alt="">Войти
                                в кабинет
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-2">
                <a href="https://www.instagram.com/bitcoin_stars/"><img class="social-menu" src="img/insta.png"
                                                                        alt="instagram"></a>
                <a href="https://www.youtube.com/channel/UCPx7Yj8ra7FKTwEmG5SNiRw?view_as=subscriber"><img
                            class="social-menu" src="img/yt.png" alt="youtube"></a>
                <a href="https://vk.com/bitcoinstars"><img class="social-menu" src="img/vk.png" alt="vk"></a>
            </div>
        </div>
    </div>
</div>
<div class="mobile-menu hidden-md hidden-lg">
    <?php require "template/mobileMenu.php"; ?>
</div>
<a href="#row1" class="arrow_up_link"><i class="fas fa-arrow-circle-up arrow_up"></i></a>
<div class="row1" id="row1">
    <div class="container">
        <div class="row what-is-crypto">
            <div class="col-md-3 col-xs-3 col-sm-3">
                <img class="first" src="img/first.png" alt="first">
                <!--<p class="main-number wow fadeIn" data-wow-duration="4s">1</p>
                <div class="ripples wow">
                    <div class="ripple ripple-1 wow"></div>
                    <div class="ripple1 ripple-2 wow"></div>
                    <div class="ripple2 ripple-3 wow"></div>
                </div>-->
            </div>
            <div class="col-md-9 col-xs-9 col-sm-9">
                <h1 class="title-bg1" id="aboutCrypto">Что такое криптовалюта?</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-xs-3 col-sm-3">
                <img class="img100 btc fadeInLeft wow" data-wow-delay="0.5s" data-wow-duration="1.5s"
                     src="img/btc.png"
                     alt="first">
                <span class="span_img100 wow"></span>
            </div>
            <div class="col-md-5 col-xs-5 col-sm-5 fadeInRight wow" data-wow-delay="0.5s" data-wow-duration="1.5s">
                <p class="text-bg1">Это уникальное изобретение современного мира,
                    <span class="red">разновидность</span> цифровой <span class="red">валюты,</span> способная
                    <span class="red">приносить огромный доход.</span> Создание и контроль
                    за которой базируются на криптографических методах.
                    Особенностью критовалют является <span class="red">отсутствие</span>
                    какого-либо <span class="red">контролирующего органа.</span></p>
            </div>
            <div class="col-md-5 col-xs-5 col-sm-5">

            </div>
        </div>
        <div class="row blockchein-row">
            <div class="col-md-3 col-xs-3 col-sm-3">
                <img class="img100 blockchein fadeInLeft wow" data-wow-delay="0.5s" data-wow-duration="1.5s"
                     src="img/link.png" alt="first">
                <span class="span2_img100 wow"></span>
            </div>
            <div class="col-md-5 col-xs-5 col-sm-5 fadeInRight wow" data-wow-delay="0.5s" data-wow-duration="1.5s">
                <p class="text-bg1">Функционирование данной системы основано
                    на технологии <span class="red">blockchain.</span> Это выстроенная по
                    определённым правилам непрерывная
                    <span class="red">последовательная цепочка блоков,</span> содержащих
                    информацию. Блокчейн как вечный цифровой
                    распределённый <span class="red">журнал</span> экономических <span
                            class="red">транзакций,</span>
                    который может быть запрограммирован для записи
                    <span class="red">не только финансовых операций, но</span> и практически
                    <span class="red">всего, что имеет ценность.</span></p>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4 planet">
                <img src="img/planet-btc.png" alt="planet">
            </div>
        </div>
    </div>
</div>
<div class="row2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 two">
                <img src="img/two.png" alt="two">
                <!--<p class="main-number wow fadeIn" data-wow-duration="3s">2</p>
                <div class="ripples wow">
                    <div class="ripple ripple-1"></div>
                    <div class="ripple1 ripple-2"></div>
                    <div class="ripple2 ripple-3"></div>
                </div>-->
                <span class="span_two_img100"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12">
                <p class="facts-crypto">Факты о Криптовалютах</p>
            </div>
        </div>
        <div class="row bg2-row">
            <div class="col-md-2 col-xs-2 col-sm-2 wow fadeInLeft" data-wow-delay="1s" data-wow-duration="1.5s">
                <img class="img100" src="img/btc.png" alt="">
                <span class="arrow_left"></span>
                <span class="arrow_left_to_bot"></span>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4 wow fadeInLeft" data-wow-delay="1s" data-wow-duration="1.5s">
                <p class="text-bg2">Первой криптовалютой, появившейся в 2008-м году был <span
                            class="red">Bitcoin</span>
                </p>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4 wow fadeInRight" data-wow-delay="1.5s" data-wow-duration="1.5s">
                <p class="text-bg2"><span class="red">69% мировых банков</span> собираются внедрить
                    технологию Blockchain в свою деятельность.</p>
            </div>
            <div class="col-md-2 col-xs-2 col-sm-2 wow fadeInRight" data-wow-delay="1.5s" data-wow-duration="1.5s">
                <img class="img100" src="img/1.png" alt="">
                <span class="arrow_right"></span>
                <span class="arrow_right_to_bot"></span>
            </div>
        </div>
        <div class="row bg2-row">
            <div class="col-md-2 col-xs-2 col-sm-2">
                <img class="img100 wow fadeInLeft" data-wow-delay="1s" data-wow-duration="1.5s" src="img/2L.png"
                     alt="">
                <span class="line_top wow"></span>

            </div>
            <div class="col-md-4 col-xs-4 col-sm-4">
                <p class="text-bg2 wow fadeInLeft" data-wow-delay="2s" data-wow-duration="1.5s">На сегодняшний день
                    доподлинно неизвестно,
                    кто создал Bitcoin.Считается, что это был японский
                    программист <span class="red">Сатоши Накамото.</span></p>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4">
                <p class="text-bg2 wow fadeInRight" data-wow-delay="2.5s" data-wow-duration="1.5s"><span
                            class="red">15% мирового запаса</span>
                    Bitcoin принадлежит ФБР.</p>
            </div>
            <div class="col-md-2 col-xs-2 col-sm-2">
                <img class="img100 wow fadeInRight" data-wow-delay="1.5s" data-wow-duration="1.5s" src="img/2.png"
                     alt="">
                <span class="line_top wow"></span>

            </div>
        </div>
        <div class="row bg2-row">
            <div class="col-md-2 col-xs-2 col-sm-2">
                <img class="img100 wow fadeInLeft" data-wow-delay="1s" data-wow-duration="1.5s" src="img/3L.png"
                     alt="">
                <span class="line_top line_top1024 wow"></span>

            </div>
            <div class="col-md-4 col-xs-4 col-sm-4">
                <p class="text-bg2 wow fadeInLeft" data-wow-delay="2s" data-wow-duration="1.5s">В <span class="red">2010-м году</span>
                    Bitcoin, стоил <span
                            class="red">$ 0.5 за 1 BTC,</span> а в
                    <span class="red">2017-м году</span> стоимость <span
                            class="red">1 BTC доходила до 20000$!</span>
                </p>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4">
                <p class="text-bg2 wow fadeInRight" data-wow-delay="2.5s" data-wow-duration="1.5s">Университет в
                    Никосии, на Кипре, <span class="red">стал первым в
                    мире учебным заведением</span>, которое принимает в
                    качестве оплаты криптовалюту.</p>
            </div>
            <div class="col-md-2 col-xs-2 col-sm-2">
                <img class="img100 wow fadeInRight" data-wow-delay="1.5s" data-wow-duration="1.5s" src="img/3.png"
                     alt="">
                <span class="line_top line_top1024 wow"></span>

            </div>
        </div>
        <div class="row bg2-row">
            <div class="col-md-2 col-xs-2 col-sm-2">
                <img class="img100 wow fadeInLeft" data-wow-delay="1s" data-wow-duration="1.5s" src="img/4L.png"
                     alt="">
                <span class="line_top line_top1024_1 wow"></span>

            </div>
            <div class="col-md-4 col-xs-4 col-sm-4">
                <p class="text-bg2 wow fadeInLeft" data-wow-delay="2s" data-wow-duration="1.5s">На данный момент
                    существует <span class="red">более 2000
                различных криптовалют.</span></p>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4">
                <p class="text-bg2 wow fadeInRight" data-wow-delay="2.5s" data-wow-duration="1.5s">Мощность сети
                    Bitcoin
                    превышает <span class="red">500 первых
                суперкомпьютеров.</span></p>
            </div>
            <div class="col-md-2 col-xs-2 col-sm-2">
                <img class="img100 wow fadeInRight" data-wow-delay="1.5s" data-wow-duration="1.5s" src="img/4.png"
                     alt="">
                <span class="line_top line_top1024_1 wow"></span>

            </div>
        </div>
        <div class="row bg2-row">
            <div class="col-md-2 col-xs-2 col-sm-2">
                <img class="img100 wow fadeInLeft" data-wow-delay="1s" data-wow-duration="1.5s" src="img/5L.png"
                     alt="">
                <span class="line_top line_top1024_3 wow"></span>

            </div>
            <div class="col-md-4 col-xs-4 col-sm-4">
                <p class="text-bg2 wow fadeInLeft" data-wow-delay="2s" data-wow-duration="1.5s">Общая капитализация
                    криптовалют достигала
                    отметки свыше <span class="red">800 млрд $!</span></p>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4">
                <p class="text-bg2 wow fadeInRight" data-wow-delay="2.5s" data-wow-duration="1.5s">Компания <span
                            class="red">Virgin Galactik,</span> которая планирует
                    организовавать суборбитальные космические
                    полёты, <span class="red">принимает BTC.</span></p>
            </div>
            <div class="col-md-2 col-xs-2 col-sm-2">
                <img class="img100 wow fadeInRight" data-wow-delay="1.5s" data-wow-duration="1.5s" src="img/5.png"
                     alt="">
                <span class="line_top line_top1024_3 wow"></span>

            </div>
        </div>
        <div class="row bg2-row">
            <div class="col-md-2 col-xs-2 col-sm-2">
                <span class="line_bot wow"></span>
                <img class="img100 wow fadeInLeft" data-wow-delay="1s" data-wow-duration="1.5s" src="img/6L.png"
                     alt="">
                <span class="line_top line_top1024_2 wow"></span>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4">
                <p class="text-bg2 wow fadeInLeft" data-wow-delay="2s" data-wow-duration="1.5s">Порядка 70% от общей
                    капитализации принадлежит
                    <span class="red">5 криптовалютам.</span></p>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4">
                <p class="text-bg2 wow fadeInRight" data-wow-delay="2.5s" data-wow-duration="1.5s"><span
                            class="red">21 миллион</span>
                    - таково колличество Bitcoin,
                    которое может быть добыто.</p>
            </div>
            <div class="col-md-2 col-xs-2 col-sm-2">
                <span class="line_top line_top1024_2 wow"></span>
                <img class="img100 wow fadeInRight" data-wow-delay="1.5s" data-wow-duration="1.5s" src="img/6.png"
                     alt="">
                <span class="arrow_right_bot"></span>
            </div>
        </div>
    </div>
</div>
<div class="row3">
    <div class="container">
        <div class="row bg3">
            <div class="col-md-2 col-xs-2 col-sm-2 two">
                <img src="img/three.png" alt="three">
                <!--<p class="main-number1 wow fadeIn" data-wow-duration="3s">3</p>
                <div class="ripples wow">
                    <div class="analytic-ripple1 ripple-1 wow"></div>
                    <div class="analytic-ripple2 ripple-2 wow"></div>
                    <div class="analytic-ripple3 ripple-3 wow"></div>
                </div>-->
            </div>
            <div class="col-md-10 col-xs-10 col-sm-10">
                <h1 class="title-bg3">Аналитика.</h1>
            </div>
        </div>
        <div class="row bg3-row">
            <div class="col-md-2 col-xs-2 col-sm-2">
                <img class="img100" src="img/analitica.png" alt="">
                <span class="line_top"></span>
                <span class="line_bottom wow"></span>

            </div>
            <div class="col-md-5 col-xs-5 col-sm-5 wow fadeInLeft">
                <p class="text-bg3">Цифровые активы продолжают опережать традиционные
                    по доходности. Те, кто успел купить криптовалюты еще в
                    начале года, <span class="red">могли увеличить вложения почти в семь раз.</span></p>
            </div>
            <div class="col-md-5 col-xs-5 col-sm-5 diagram-row wow fadeInRight">
                <p class="text-diagram">Доходность цифровых и традиционных
                    активов с начала 2017 года</p>
                <img class="diagram" src="img/diagram1.jpg" alt="diagrama">
            </div>
        </div>
        <div class="row bg3-row">
            <div class="col-md-2 col-xs-2 col-sm-2">
                <img class="img100" src="img/analitica.png" alt="">
                <span class="line_bottom wow"></span>
            </div>
            <div class="col-md-5 col-xs-5 col-sm-5 wow fadeInLeft">
                <p class="text-bg3"><span class="red">Самыми доходными</span> криптовалютами в третьем квартале
                    <span class="red">стали</span> вовсе не биткоин или эфир, а <span class="red">малоизвестные
                        альткоины:</span> AdEx, Rise, Triggers, NoLimitCoin, Pura.</p>
            </div>
            <div class="col-md-5 col-xs-5 col-sm-5 diagram-row wow fadeInRight">
                <p class="text-diagram">Самые доходные криптовалюты
                    по итогам III квартала 2017 года</p>
                <img class="diagram" src="img/diagram2.jpg" alt="diagrama">
            </div>
        </div>
        <div class="row bg3-row">
            <div class="col-md-2 col-xs-2 col-sm-2">
                <img class="img100" src="img/analitica.png" alt="">
                <span class="line_bottom wow"></span>

            </div>
            <div class="col-md-5 col-xs-5 col-sm-5 wow fadeInLeft">
                <p class="text-bg3">Рост криптовалют с начала 2017 года впечатляет.
                    В среднем <span class="red">он составил 3000%!</span></p>
            </div>
            <div class="col-md-5 col-xs-5 col-sm-5 diagram-row wow fadeInRight">
                <p class="text-diagram">Рост криптовалют с начала 2017 года </p>
                <img class="diagram" src="img/diagram3.jpg" alt="diagrama">
            </div>
        </div>
        <div class="row bg3-row">
            <div class="col-md-2 col-xs-2 col-sm-2">
                <img class="img100" src="img/analitica.png" alt="">
                <span class="line_bottom wow"></span>
            </div>
            <div class="col-md-5 col-xs-5 col-sm-5 wow fadeInLeft">
                <p class="text-bg3">По мере того, как увеличивается стоимость криптовалют,
                    растет и их популярность. Все больше пользователей
                    <span class="red">обращаются к Google,</span> чтобы <span class="red">узнать,</span> что такое
                    <span
                            class="red">bitcoin,
                        ethereum, blockchain</span> и так далее.</p>
            </div>
            <div class="col-md-5 col-xs-5 col-sm-5 diagram-row wow fadeInRight">
                <p class="text-diagram">Популярность поисковых запросов в Google</p>
                <img class="diagram" src="img/diagram4.jpg" alt="diagrama">
            </div>
        </div>
    </div>
</div>
<div class="row4">
    <div class="container">
        <div class="row bg4">
            <div class="col5">
                <h1 class="title-bg4">СПОСОБЫ
                    ДОБЫЧИ
                    КРИПТОВАЛЮТ.</h1>
                <img src="img/four.png" alt="four">
                <!--<p class="main-number2 wow fadeIn" data-wow-duration="3s">4</p>
                <div class="ripples wow">
                    <div class="dobicha-ripple1 ripple-1 wow"></div>
                    <div class="dobicha-ripple2 ripple-2 wow"></div>
                    <div class="dobicha-ripple3 ripple-3 wow"></div>
                </div>-->
            </div>
            <div class="col5-1">
                <img src="img/dobicha-1.png" class="fadeInUp wow" data-wow-duration="1s" data-wow-delay="1s" alt="">
                <span class="line_right"></span>
                <p class="text-bg4">Майнинг - один из
                    способов получение
                    криптовалюты,
                    основанный на
                    использовании
                    мощностей компьютера
                    для решения
                    математических задач.</p>
            </div>
            <div class="col5-1">
                <img src="img/dobicha-2.png" class="fadeInUp wow" data-wow-duration="1s" data-wow-delay="1.3s"
                     alt="">
                <span class="line_right"></span>
                <p class="text-bg4">Покупка криптовалют
                    у других людей,
                    посредством
                    специальных сайтов
                    или форумов.</p>
            </div>
            <div class="col5-1">
                <img src="img/dobicha-3.png" class="fadeInUp wow" data-wow-duration="1s" data-wow-delay="1.6s"
                     alt="">
                <span class="line_right"></span>
                <p class="text-bg4">Покупка криптовалют
                    через сайты-обменники,
                    или telegram-боты.</p>
            </div>
            <div class="col5-1">
                <img src="img/dobicha-4.png" class="fadeInUp wow" data-wow-duration="1s" data-wow-delay="1.9s"
                     alt="">
                <span class="line_right"></span>
                <span class="arrow_right"></span>

                <p class="text-bg4">Покупка криптовалют
                    на бирже. </p>
            </div>
        </div>
    </div>
</div>
<div class="row5">
    <div class="container">
        <div class="row bg5">
            <div class="col-xs-12 col-md-12">
                <table border="1" bordercolor="#d9b824" class="table-style">
                    <tr class="row-table1">
                        <td class="title-table">Способ добычи криптовалюты</td>
                        <td class="title-table">Майнинг</td>
                        <td>Покупка у других людей</td>
                        <td>Покупка в обменниках</td>
                        <td>Покупка на бирже</td>
                    </tr>
                    <tr class="row-table2">
                        <td class="title-table">Сложность реализации</td>
                        <td class="red-table">Высокая</td>
                        <td class="green-table">Низкая</td>
                        <td class="green-table">Низкая</td>
                        <td class="green-table">Низкая</td>
                    </tr>
                    <tr class="row-table3">
                        <td class="title-table">Необходимые вложения</td>
                        <td class="red-table">От 60000 руб.</td>
                        <td class="gray-table">От 1000 руб.</td>
                        <td class="gray-table">От 1000 руб.</td>
                        <td class="green-table">От 500 руб.</td>
                    </tr>
                    <tr class="row-table4">
                        <td class="title-table">Сроки окупаемости</td>
                        <td class="red-table">От полугода</td>
                        <td class="red-table">В зависимости от курса валюты</td>
                        <td class="red-table">В зависимости от курса валюты</td>
                        <td class="green-table">От 1 дня</td>
                    </tr>
                    <tr class="row-table5">
                        <td class="title-table">Доходность</td>
                        <td class="gray-table">От 10%</td>
                        <td class="red-table">В зависимости от курса валюты</td>
                        <td class="red-table">В зависимости от курса валюты</td>
                        <td class="green-table">От 40%</td>
                    </tr>
                    <tr class="row-table6">
                        <td class="title-table">Безопасность</td>
                        <td class="green-table">Высокая</td>
                        <td class="red-table">Низкая</td>
                        <td class="green-table">Высокая</td>
                        <td class="green-table">Высокая</td>
                    </tr>
                    <tr class="row-table7">
                        <td class="title-table">Стабильность дохода</td>
                        <td class="gray-table">Средняя</td>
                        <td class="red-table">Низкая</td>
                        <td class="red-table">Низкая</td>
                        <td class="green-table">Высокая</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="bg6">
    <div class="container">
        <div class="row">
            <div class="col-md-12 five">
                <img src="img/five.png" class="img100" alt="five">
                <!--<p class="main-number3 wow fadeIn" data-wow-duration="3s">5</p>
                <div class="bg6-ripples wow">
                    <div class="bg6-ripple1 ripple-1 wow"></div>
                    <div class="bg6-ripple2 ripple-2 wow"></div>
                    <div class="bg6-ripple3 ripple-3 wow"></div>
                </div>-->
                <h1 class="title-bg6">ПОЧЕМУ ТОРГОВАТЬ КРИПТОВАЛЮТОЙ ВЫГОДНО?</h1>
            </div>
        </div>
        <div class="row bg7">
            <div class="col-md-4 col-xs-4 col-sm-4">
                <img class="img100" src="img/clock.gif" alt="">
                <span class="arrow_left"></span>
                <p class="box-bg7" style="padding: 43px 10px;">Криптовалютами можно торговать <span
                            class="red">7 дней</span> в
                    неделю и 24 часа в сутки. Они не привязаны ко
                    времени или праздникам. Официального курса
                    и официальной цены тоже нет. Все это создаёт
                    просто идеальные условия для арбитража.
                </p>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4">
                <img class="img100" src="img/world.gif" alt="">
                <span class="line"></span>
                <p class="box-bg7">Криптовалюты – <span class="red">это глобальные валюты.</span><br>
                    Они не привязаны ни к одному государству,
                    а значит их можно считать в какой-то мере
                    независимыми. Конечно, на них влияют
                    события, которые происходятв мире. Кризисы
                    очень сильно сказываются на стоимости
                    криптовалют. Владельцы крупных счетов
                    обратили внимание именно на них потому,
                    что <span class="red">контролю эти валюты не поддаются.</span>
                </p>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4">
                <img class="img100" src="img/schedule.gif" alt="">
                <span class="arrow_right"></span>
                <p class="box-bg7" style="padding: 45px 10px">Криптовалюты – <span class="red">это высокая волатильность.</span>
                    Цены за последние несколько месяцев
                    менялись с поразительной скоростью. Высокая
                    волатильность также создаёт <span class="red">отличные условия
                        для трейдинга.</span>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="bg8">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="img/six.png" class="img100" alt="six">
                <!--<p class="main-number4 wow fadeIn" data-wow-duration="3s">6</p>
                <div class="bg8-ripples wow">
                    <div class="bg8-ripple1 ripple-1 wow"></div>
                    <div class="bg8-ripple2 ripple-2 wow"></div>
                    <div class="bg8-ripple3 ripple-3 wow"></div>
                </div>-->
                <span class="line_left"></span>
                <span class="line"></span>
            </div>
        </div>
        <div class="row bg9">
            <div class="col-md-12">
                <h1 class="title-bg9">ТОРГОВЛЯ НА БИРЖЕ.</h1>
            </div>
        </div>
        <div class="row bg10">
            <div class="col-md-2 col-xs-2 col-sm-2">
                <img class="img100" src="img/birja-1.png" alt="">
                <span class="line_bottom wow"></span>
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6">
                <p class="text-bg9">Принципы торговли <br><br>

                    <span class="red">Обменные операции</span> и спекуляции на биржах криптовалют <span class="red">идентичны
                        любой другой.</span> Для получения прибыли <span class="red">надо купить подешевле, продать
                        подороже.</span> То есть, <span class="red">точно также,</span> как и при инвестициях <span
                            class="red">в обычную валюту.</span>
                    Естественно, что база инструментов и принцип определения целей для
                    торговли ставятся таким же образом, как и на рынках ценных бумаг или
                    форексе. </p>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4 bg9-img">
                <img src="img/buy-sell.png" alt="buy-sell">
                <!--<p class="bg9-img-text">Пример содержания диверсифицированного
                    инвестиционного портфеля</p>-->
            </div>
        </div>
        <div class="row bg11">
            <div class="col-md-2 col-xs-2 col-sm-2">
                <span class="line_bottom_sec wow"></span>
                <img class="img100" src="img/birja-2.png" alt="">
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6">
                <p class="text-bg9">Создание диверсифицированного инвестиционного портфеля
                    <br><br>
                    Прием, который поможет вам зарабатывать на бирже криптовалют
                    <span class="red">с минимальными рисками</span> – это создание инвестиционного портфеля.
                    А именно, <span class="red">приобретение не одной криптовалюты, а сразу нескольких.</span></p>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4 bg9-img">
                <img src="img/birji.png" class="birji-img" alt="birji">
            </div>
        </div>
        <div class="row popular-row">
            <div class="col-md-2 col-xs-2 col-sm-2">
                <span class="line_bottom_last wow"></span>

                <img class="img100" src="img/birja-3.png" alt="">
            </div>
            <div class="col-md-10 col-xs-10 col-sm-10">
                <p class="popular-text">Популярные биржи криптовалют</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-4 col-sm-4 col3">
                <img class="birji" src="img/exmo.png" alt="exmo">
                <p class="birji-text">EXMO — биржа криптовалют работает с
                    2013 года, где можно вводить и выводить
                    доллары, рубли и евро. То есть можно
                    перевести деньги со Сбербанка на биржу
                    и дешево купить любую криптовалюту!
                    Самые ходовые пары считаются BTC/USD,
                    BTC/RUB, ETH/USD и DASH/RUB.
                    Переводы внутри сети осуществляются
                    за несколько секунд, а <span class="red">вывод средств
                        идет от 5 до 30 минут.</span></p>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4 col3-1">
                <img class="birji" src="img/bitfinex.png" alt="bitfinex">
                <p class="birji-text birji-text-padding">Bitfinex. Одна из крупнейших бирж по
                    объему торговли. Как и на фондовом
                    рынке, имеется возможность
                    осуществлять <span class="red">маржинальную торговлю,</span>
                    без маржи и заниматься брокерством,
                    которое обеспечивает для других игроков
                    возможность торговать на бирже с маржей.</p>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4 col3-1">
                <img class="birji" src="img/bittrex.png" alt="bittrex">
                <p class="birji-text">Bittrex работает с 2015 года и позволяет
                    работать с тысячами криптовалютных пар,
                    имеет двухфакторную авторизацию и
                    холодное хранение активов большинства
                    пользователей для защиты от возможных
                    системных сбоев. Эта биржа, возможно,
                    <span class="red">одна из самых безопасных</span> платформ для
                    онлайн-торговли, так как ее создатели
                    называют себя «параноиками
                    безопасности».</p>
            </div>
        </div>
    </div>
</div>
<div class="row9">
    <div class="container">
        <div class="row birji-img-2">
            <div class="col-md-6 col6 col-xs-6 col-sm-6">
                <img src="img/bihance.png" alt="bihance">
                <p class="birji-text-2">Криптовалютная биржа Binance это
                    относительно новая биржа, которая начала
                    работу в 2017 году, и за это время она
                    получила популярность среди
                    пользователей. Сейчас биржа Binance
                    <span class="red">входит в ТОП-5 бирж</span> по суточному объему
                    торгов. Штаб квартира биржи Binance
                    <span class="red">находится в Гонконге,</span> что <span class="red">дает</span> большую
                    <span class="red">надежность</span> чем юрисдикции прочих бирж.
                </p>
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6 col6-1">
                <img src="img/poloniex.png" alt="poloniex">
                <p class="birji-text-2">Poloniex (Полоникс) — <span class="red">самая крупная</span> и
                    известная биржа криптовалют в мире. На
                    ней можно купить или продать все
                    популярные пары. Она начала работать в
                    2014 году и достаточно быстро за счет
                    высокой степени надежности вышла на
                    первое место по суточному объему
                    торговли. Опытные трейдеры часто
                    называют эту площадку <span class="red">«Поло».</span>
                    Биржей пользуется более <span class="red">45 тысяч
                        пользователей.</span>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="bg12">
    <div class="container bg12">
        <div class="row">
            <div class="col-md-12">
                <span class="last_line"></span>
                <img class="img100 hidden-xs hidden-sm" src="img/six.png" alt="seven">
                <!--<p class="main-number5 wow fadeIn" data-wow-delay="1s" data-wow-duration="3s">7</p>
                <div class="bg12-ripples wow">
                    <div class="bg12-ripple1 ripple-1 wow"></div>
                    <div class="bg12-ripple2 ripple-2 wow"></div>
                    <div class="bg12-ripple3 ripple-3 wow"></div>
                </div>-->
                <p class="text-bg12"><span class="red">2018</span> год является оптимальным временем когда можно
                    смело
                    войти на
                    криптовалютный рынок и успешно <span class="red">преумножить свой капитал.</span>
                    При грамотной торговле криптовалютами на биржах <span class="red">ежемесячный доход</span>
                    может
                    составить от <span class="red">40 до 300% и более</span> от ваших инвестиций.</p>
            </div>
        </div>
    </div>
</div>
<div class="footer-ready">
    <div class="video-height1">
        <video autoplay="autoplay" loop="loop" preload="auto">
            <source src="img/tumannosti-loop.mp4">
        </video>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-6 col-sm-6">
                <p class="title">ОСТАЛИСЬ ВОПРОСЫ?</p>
                <span class="line-quest wow"></span>

                <p class="desc">Оставьте заявку на
                    <span class="red">бесплатную консультацию.</span></p>
                <form id="formQuestions">
                    <input type="hidden" name="title" value="Форма - остались вопросы">
                    <input type="text" class="field-ready" name="name" required placeholder="Имя:"><br>
                    <input type="text" class="field-ready" name="phone" required placeholder="Телефон:">
                    <div id="resultQuestion" style="color: limegreen; text-align: center;"></div>
                    <button type="submit" class="sendFormReady">Заказать консультацию</button>
                </form>
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6 col-ready">
                <p class="title">Готовы начать свой путь на
                    рынке криптовалют?</p>
                <p class="desc">Пройдите бесплатное обучение основам торговли
                    на криптовалютных биржах <span class="red">после регистрации.</span></p>

                <a href="registration" class="reg-ready">Регистрация</a>
                <script type="text/javascript" src="//vk.com/js/api/openapi.js?153"></script>

                <!-- VK Widget -->
                <div id="vk_groups" class="hidden-xs hidden-sm"></div>
                <script type="text/javascript">
                    VK.Widgets.Group("vk_groups", {mode: 3, width: "300"}, 156978466);
                </script>
                <iframe class="hidden-xs hidden-sm"
                        src="//widget.instagramm.ru/?imageW=3&imageH=2&thumbnail_size=74&type=0&typetext=cristiano&head_show=1&profile_show=1&shadow_show=1&bg=255,255,255,1&opacity=true&head_bg=46729b&subscribe_bg=ad4141&border_color=c3c3c3&head_title="
                        allowtransparency="true" frameborder="0" scrolling="no"
                        style="border:none;overflow:hidden;width:260px;height:313px;"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="footer-reg centered">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-12 col-footer1">
                <img src="img/btcstar.png" class="btcstar" alt="">
                <p class="info">Закрытый трейдерский клуб. <br>
                    Платные сигналы, аналитика. <br>
                    Новости криптовалют.</p>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12">
                <p class="copyright">&copy; 2017-2018 StarBitClub.</p>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-12 col-money">
                <ul>
                    <li><img src="img/visa.png" alt=""></li>
                    <li><img src="img/mastercard.png" alt=""></li>
                    <li><img src="img/qiwi.png" alt=""></li>
                    <li><img src="img/yandex.png" alt=""></li>
                </ul>
            </div>
            <div class="col-md-1 col-xs-12 col-sm-12 col-footer4">
                <img src="img/logo-main-new.png" class="logo-footer" alt="">
                <p><a href="#">Пользовательское соглашение</a></p>
            </div>
        </div>
    </div>
</div>
<div class="popup_learn" style="display: none;">
    <div class="popup_container">
        <a class="close__popup1">X</a>
        <img class="learn__img" src="img/header1.png">
        <p class="learn__text">Сделайте первый шаг на
            рынке криптовалют.</p>
        <p class="learn__subtext">Пройдите наш бесплатный
            обучающий видеокурс.<span class="red">*</span></p>
        <p class="learn__desc"><span class="red">*</span>Видеокурс будет доступен сразу после
            регистрации и займет у вас не более 1 часа.</p>
        <a href="registration.php" class="sendFormReady">Начать обучение</a>
    </div>
</div>

<div class="popup_call" style="display: none;">
    <div class="popup_consult">
        <a class="close__popup">X</a>
        <p class="consult__title">Заказать звонок</p>
        <p class="consult__text">Заполните информацию и мы свяжемся с вами в первую же
            свободную минуту.</p>
        <form id="consultForm">
            <input type="hidden" name="title" value="Форма Бесплатная консультация">
            <label class="labelForConsult1" for="consultForm__input1"></label>
            <input type="tel" required placeholder="+7(___)___-__-__" name="consultPhone" id="consultForm__input1"
                   class="consultForm__input1">
            <label class="labelForConsult2" for="consultForm__input2"></label>
            <input type="text" required placeholder="Ваше Имя" id="consultForm__input2" name="consultName"
                   class="consultForm__input2">
            <button type="submit" class="consultForm__btn">Заказать звонок</button>
            <div id="resultQuestion" style="color: limegreen; text-align: center;"></div>
        </form>
        <p class="consult__desc">Нажимая на кнопку, вы соглашаетесь с нашей <a href="">политикой конфиденциальности</a>
        </p>
    </div>
</div>

<div class="consultThanks" style="display: none;">
    <div class="popup_consultThanks">
        <a class="close__popup">X</a>
        <p class="consult__title">Заказать звонок</p>
        <img src="img/thanksPopup.png" class="thanksPopup" alt="">
        <p class="thanksTitle">Спасибо!</p>
        <p class="thanksDesc">Мы свяжемся с вами
            в первую же свободную минуту.</p>
    </div>
</div>

<?php
$query = 'SELECT * FROM `admin`';
$result = mysqli_query($link, $query); //ответ базы запишем в переменную $result
$user = mysqli_fetch_assoc($result); //преобразуем ответ из БД в нормальный массив PHP
$akcia_banner = $user['akcia_banner'];
if ($akcia_banner == 1) {
    ?>
    <div class="modal fade" id="secondModal">
        <div class="modal-akcia">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button class="close closeSecond">×</button>
                    <p class="title-modal">Учавствуй в конкурсе с призовым фондом - 1 BTC</p>
                    <div class="modal-body">
                        <img src="img/vk-akcia.png" class="icon-popup" alt="">
                        <p class="desc-modal">Мы проводим конкурс с призовым фондом - 1 BTC. Условия конкурса в группе
                            Вконтакте.</p>
                        <a href="#" class="link-to-vk">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //ЗАПИСЬ В КУКИ
        $('.closeSecond').click(function () {
            $('#secondModal').css("display", "none");
            $.cookie("secondModal", "12house", {expires: 0});
        });

        //ЗАПИСЬ В КУКИ
        $('.close__popup1').click(function () {
            $('.popup_learn').css("display", "none");
            $.cookie("popup__learn", "12house", {expires: 0});
        });

        $('.btn-logo').click(function () {
            $('.popup_call').css("display", "block");
        });

        $('.close__popup').click(function () {
            $('.popup_call').css("display", "none");
            $('.consultThanks').css("display", "none");
        });

        //ПОПАП КОНКУРС

        $(document).ready(function ($) {
            if ($.cookie("secondModal") == null) {
                var banner = $('#secondModal');
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 2000 && $(this).scrollTop() < 2020) {
                        banner.css("display", "block");
                        banner.css("opacity", "1");
                    }
                });
            } else {
                $("#secondModal").css("display", "none");
            }
        });

        //ПОПАП ОБУЧЕНИЕ

        $(document).ready(function ($) {
            if ($.cookie("popup__learn") == null) {
                var popupLearn = $('.popup_learn');
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 7000 && $(this).scrollTop() < 7020) {
                        popupLearn.css("display", "block");
                    }
                });
            } else {
                $(".popup_learn").css("display", "none");
            }
        });

        $("#formQuestions").submit(function () {
            $.ajax({
                type: "POST",
                url: "mail.php", //Change
                data: $("#formQuestions").serialize(),
                success: function success(data) {
                    console.log('success!');
                    $('#resultQuestion').text('Ваша заявка успешно отправлена');
                    $('#formQuestions').reset();
                }
            });
            return false;
        });

        $("#consultForm").submit(function () {
            $.ajax({
                type: "POST",
                url: "mailConsult.php", //Change
                data: $("#consultForm").serialize(),
                success: function success(data) {
                    console.log('success!');
                    $('.popup_call').css("display", "none");
                    $('.consultThanks').show();
                }
            });
            return false;
        });
    </script>
<?php } ?>
<!-- login modal -->
<?php require_once "template/login_popup.php"; ?>
<script>
    jQuery(document).ready(function ($) {
        var nav = $('.my-menu');
        $(window).scroll(function () {
            if ($(this).scrollTop() > 370) {
                nav.slideDown('slow');
                nav.addClass("f-nav_show");
            } else {
                nav.slideUp('slow');
                nav.removeClass("f-nav_show");
            }
        });
    });
</script>
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
<script data-skip-moving="true" async>
    (function (w, d, u) {
        var s = d.createElement('script');
        s.async = 1;
        s.src = u + '?' + (Date.now() / 60000 | 0);
        var h = d.getElementsByTagName('script')[0];
        h.parentNode.insertBefore(s, h);
    })(window, document, 'https://cdn.bitrix24.ru/b6766487/crm/site_button/loader_2_7nsjuk.js');
</script>
</body>
</html>
