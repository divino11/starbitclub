<?php
session_start();
require_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <title>Торговые сигналы криптовалют - инвестиционный клуб BITCOIN STARS</title>
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
    <script src="js/script.js"></script>
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
<a href="#trailer" class="arrow_up_link"><i class="fas fa-arrow-circle-up arrow_up"></i></a>
<div class="logo" id="trailer">
    <div class="container">
        <div class="video-height1">
            <video autoplay="autoplay" loop="loop" preload="auto">
                <source src="img/tumannosti-loop.mp4">
            </video>
        </div>
        <div class="row" style="position:relative;">
            <!--<p class="hotline">Телефон горячей линии<br>+8(800) 555-35-55</p>-->
            <div class="col-md-6 col-xs-12 logo-col">
                <img class="img-logo" src="img/logo-header-new.png" alt="logo">
                <p class="title">ИНВЕСТИЦИОННЫЙ КЛУБ.</p>
                <p class="text">Миллионы людей сейчас зарабатывают на криптовалютных биржах. <br>
                    Мы поможем вам стать одним из них.
                    <br><br>
                    Вступая в наш клуб вы получаете доступ к знаниям и опыту всей нашей команды. <br>
                    Хотите узнать больше - оставьте заявку на консультацию.</p>
                <div class="field-btn-logo">
                    <button class="btn-logo">Бесплатная консультация</button>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="col-md-4 col-xs-4 col-sm-4">
                    <p class="lesson">Обучаем</p>
                    <img src="img/header1.png" class="img100" alt="book">
                    <p class="description1 hidden-xs hidden-sm">
                        Обучим вас
                        торговать на бирже
                        криптовалют
                    </p>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4">
                    <p class="lesson">Анализируем</p>
                    <img src="img/header2.png" class="img100" alt="graph">
                    <p class="description2 hidden-xs hidden-sm">
                        Проанализируем
                        рынок:
                        что стоит покупать,
                        а что - продавать.
                    </p>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4">
                    <p class="lesson">Информируем</p>
                    <img src="img/header3.png" class="img100" alt="news">
                    <p class="description3 hidden-xs hidden-sm">
                        Расскажем вам
                        о событиях на
                        рынке
                    </p>
                </div>
            </div>
        </div>
        <div class="row hidden-xs hidden-sm">
            <div class="col-md-6 col-xs-6 col-sm-6">
                <div class="arrow-angle-fa">
                    <p class="text-arrow">Узнать больше<br>
                        о StarBitClub</p>
                    <a class="scroll" href="#aboutBS"><i class="fas fa-angle-down" style="margin-top: 25px;"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6 col-arrow">
                <div class="arrow-angle-fa">
                    <p class="text-arrow">Узнать больше<br>
                        о криптовалютном<br>
                        рынке</p>
                    <a class="scroll" href="aboutCrypto"><i class="fas fa-angle-down rotateArrow"></i></a>
                </div>
            </div>
        </div>
        <div class="row hidden-md hidden-lg">
            <div class="col-md-6 col-xs-6 col-sm-6">
                <div class="arrow-angle-fa">
                    <p class="text-arrow">Узнать больше<br>
                        о StarBitClub</p>
                    <a class="scroll" href="#aboutBS"><img src="img/new-arrow-bottom.png" class="fa-angle-down"
                                                           style="margin-top: 33px;"></a>
                </div>
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6 col-arrow">
                <div class="arrow-angle-fa">
                    <p class="text-arrow">Узнать больше<br>
                        о криптовалютном<br>
                        рынке</p>
                    <a class="scroll" href="aboutCrypto"><img src="img/new-arrow-right.png" class="fa-angle-down"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mobile_menu hidden-md hidden-lg">
    <?php require "template/mobileMenu.php"; ?>
</div>
<div class="statistic centered" id="statistic">
    <div class="cloudBackground">
        <div class="my-menu hidden-xs hidden-sm" style="display:none;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1">
                        <a href="/"><img class="logo-menu" src="img/logo-new.png" alt="logo menu"></a>
                    </div>
                    <div class="col-md-9 col-menu centered">
                        <ul>
                            <li><a href="/" class="menu-point">Главная</a></li>
                            <li><a href="/posts">Новости</a></li>
                            <li><a href="/" class="menu-point">Преимущества</a></li>
                            <li><a href="/" class="menu-point">Тарифы</a></li>
                            <li><a href="/review">Отзывы</a></li>
                            <li><a href="/registration">Регистрация</a></li>
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
                        <a href="https://www.instagram.com/starbitclub_official/" target="_blank"><img class="social-menu" src="img/insta.png"
                                                                                alt="instagram"></a>
                        <a href="https://www.youtube.com/channel/UCPx7Yj8ra7FKTwEmG5SNiRw" target="_blank"><img
                                    class="social-menu" src="img/yt.png" alt="youtube"></a>
                        <a href="https://vk.com/starbitclub" target="_blank"><img class="social-menu" src="img/vk.png" alt="vk"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="items col-md-12 col-lg-12">
                <div class="item col-md-3 col-lg-3" id="counts">
                    <div class="title">Более</div>
                    <div class="percent spincrement">5</div>
                    <div class="name">лет опыта</div>
                    <div class="description">
                        Суммарный опыт торговли на рынке валют!
                        <br><br>
                        <span class="red">*</span> в том числе и криптовалюты
                    </div>
                </div>
                <div class="item col-md-3 col-lg-3">
                    <div class="title">Более</div>
                    <div class="percent spincrement">300</div>
                    <div class="name">успешных сделок</div>
                    <div class="description">
                        На биржах <span class="red">Binance</span> и <span class="red">Exmo</span>
                    </div>
                </div>
                <div class="item col-md-3 col-lg-3">
                    <div class="title"></div>
                    <p class="percent"><span class="spincrement">914</span><span>%</span></p>
                    <div class="name">чистой прибыли</div>
                    <div class="description">
                        От торговли на рынках криптовалют за последние <span class="red">пол года!</span>
                        <br><br>
                        <span class="red">*</span> учитывая все доходы и расходы
                    </div>
                </div>
                <div class="item col-md-3 col-lg-3">
                    <div class="title"></div>
                    <p class="percent"><span class="spincrement">90</span><span>%</span></p>
                    <div class="name">наших сигналов - срабатывают!</div>
                    <div class="description">
                        Мы не предсказываем ситуацию на рынке, а анализируем и прогнозируем её. Мы честны с вами и не
                        можем
                        обещать 100% успешности наших сигналов.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="whatwedo col-md-12 col-lg-12" id="whatwedo">
    <div class="container">
        <div class="header centered" id="aboutBS">
            <h2>Что мы делаем?</h2>
        </div>
        <div class="description centered">
            <p class="line line1 hidden-xs hidden-sm">Исследуем и анализируем различные источники информации, торгуем на
                криптовалютных
                биржах, <span class="red">бесплатно обучаем
                азам криптотрейдинга,</span> предоставляем доступ к закрытым источникам анализа и сигналам рынка.</p>
        </div>
        <div class="items col-md-12 col-lg-12">
            <div class="item col-md-4 col-lg-4 fadeInUpBig wow" data-wow-delay="0.5s" data-wow-duration="2s">
                <div class="element">
                    <div class="icon"><img src="img/what-do-1.png" alt=""></div>
                    <div class="title">Доверительное управление</div>
                    <div class="text">
                        Анализ рынка криптовалют, поиск наиболее перспективных ICO. Планирование бюджета. Доверительное
                        управление<span class="red">*</span>
                        <br><br><br><br>
                        <span class="red">*</span> <i>обсуждается индивидуально</i>
                    </div>
                </div>
            </div>
            <div class="item col-md-4 col-lg-4 fadeInUpBig wow" data-wow-delay="0.5s" data-wow-duration="2s">
                <div class="element">
                    <div class="icon"><img src="img/what-do-2.png" alt=""></div>
                    <div class="title">Сигналы</div>
                    <div class="text">
                        Краткосрочные, долгосрочные сигналы<span class="red">**</span> по криптовалютам, своевременные
                        точки входа, выхода, обучение азам торговли криптовалютами и с использованием сигналов.
                        Консультации и сопровождение.
                        <br>
                        <b>Возможный доход: <span class="red">40-300%</span> и выше в месяц</b> (в зависимости от
                        состояния рынка).
                        <br>
                    </div>
                </div>
            </div>
            <div class="item col-md-4 col-lg-4 fadeInUpBig wow" data-wow-delay="0.5s" data-wow-duration="2s">
                <div class="element">
                    <div class="icon"><img src="img/what-do-3.png" alt=""></div>
                    <div class="title">Оптимизация процессов <br><br></div>
                    <div class="text">
                        Формирование криптовалютного портфеля. Технический и фундаментальный анализ, оптимизация
                        структуры портфеля. Автоматизация биржевой торговли. Разработка програмного обеспечения.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="desc-signal"><span class="red">**</span>Сигнал - результат аналитической работы,
                    позволяющий с
                    высокой точностью определить нужный момент для покупки и продажи</p>
            </div>
        </div>
    </div>
</div>
<div class="profit centered" id="profit">
    <div class="cloudBackground">
        <div class="container">
            <div class="row">
                <div class="header fadeInUpBig wow" data-wow-delay="0.5s" data-wow-duration="2s">
                    <h2>Прибыль от наших сигналов.</h2>
                </div>
                <div class="description item fadeInUpBig wow hidden-xs hidden-sm" data-wow-delay="0.5s">
                    Мы хотим дать возможность зарабатывать максимально безопасно.
                    <br>
                    Именно поэтому мы даём только <span class="red">максимально эффективные сигналы,</span>
                    <br>
                    которые с большой вероятностью <span class="red">принесут вам прибыль.</span>
                </div>
                <div class="items col-md-12 col-lg-12">
                    <div class="item col-md-4 col-lg-4 fadeInUpBig wow" data-wow-delay="0.5s" data-wow-duration="2s">
                        <a href="">
                            <div class="element">
                                <div class="icon"><img src="img/profit-1.png" alt=""></div>
                                <div class="title">Z Cash</div>
                                <div class="text">
                                    Покупка: 30 118
                                    <br>
                                    Продажа: 40 986
                                </div>
                                <div class="percent">36%</div>
                            </div>
                        </a>
                    </div>
                    <div class="item col-md-4 col-lg-4 fadeInUpBig wow" data-wow-delay="0.8s" data-wow-duration="2s">
                        <a href="">
                            <div class="element">
                                <div class="icon"><img src="img/profit-2.png" alt=""></div>
                                <div class="title">Bitcoin</div>
                                <div class="text">
                                    Покупка: 365 814
                                    <br>
                                    Продажа: 1 178 325
                                </div>
                                <div class="percent">222%</div>
                            </div>
                        </a>
                    </div>
                    <div class="item col-md-4 col-lg-4 fadeInUpBig wow" data-wow-delay="1.1s" data-wow-duration="2s">
                        <a href="">
                            <div class="element etherium">
                                <div class="icon"><img src="img/profit-3.png" alt=""></div>
                                <div class="title">Ethereum</div>
                                <div class="text">
                                    Покупка: 27 413
                                    <br>
                                    Продажа: 50 269
                                </div>
                                <div class="percent">83%</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="howit hidden-xs hidden-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="title">Как мы это делаем?</p>
            </div>
        </div>
        <div class="row col-howit">
            <div class="col-md-6 fadeIn wow" data-wow-delay="0.5s" data-wow-duration="1s">
                <div class="col-md-3">
                    <img class="img40" src="img/howit1.png" alt="">
                </div>
                <div class="col-md-9">
                    <p class="text"><span class="titles red">Фундаментальный анализ.</span><br><br>
                        Первичный фундаментальный
                        анализ даёт нам общее
                        представление о направлении
                        движения рынка криптовалют.
                    </p>
                </div>
            </div>
            <div class="col-md-6 fadeIn wow" data-wow-delay="0.5s" data-wow-duration="1s">
                <div class="col-md-3">
                    <img class="img40" src="img/howit2.png" alt="">
                </div>
                <div class="col-md-9">
                    <p class="text"><span class="titles red">Технический анализ.</span><br><br>
                        Позволяет нам спрогнозировать
                        изменение цен на основе
                        закономерностей в прошлом в
                        аналогичных обстоятельствах.
                    </p>
                </div>
            </div>
        </div>
        <div class="row col-howit">
            <div class="col-md-6 fadeIn wow" data-wow-delay="0.5s" data-wow-duration="1s">
                <div class="col-md-3">
                    <img class="img40" src="img/howit3.png" alt="">
                </div>
                <div class="col-md-9">
                    <p class="text"><span class="titles red">Командная работа.</span><br><br><br>
                        Направляет индивидуальные
                        усилия к одной цели и позволяет
                        достичь невероятных результатов.
                    </p>
                </div>
            </div>
            <div class="col-md-6 fadeIn wow" data-wow-delay="0.5s" data-wow-duration="1s">
                <div class="col-md-3">
                    <img class="img40" src="img/howit4.png" alt="">
                </div>
                <div class="col-md-9">
                    <p class="text"><span class="titles red">Инсайдерская информация.</span><br><br>
                        Закрытая информация от
                        наших зарубежных партнеров
                        дает нам неоспоримое преимущество
                        на криптовалютном рынке.

                    </p>
                </div>
            </div>
        </div>
        <div class="row col-howit">
            <div class="col-md-6 fadeIn wow" data-wow-delay="0.5s" data-wow-duration="1s">
                <div class="col-md-3">
                    <img class="img40" src="img/howit5.png" alt="">
                </div>
                <div class="col-md-9">
                    <p class="text"><span class="titles red">Математическое моделирование.</span><br><br><br>
                        Адаптирование существующих
                        математических моделей в
                        экономике повышает качество
                        предоставляемых сигналов.
                    </p>
                </div>
            </div>
            <div class="col-md-6 fadeIn wow" data-wow-delay="0.5s" data-wow-duration="1s">
                <div class="col-md-3">
                    <img class="img40" src="img/howit6.png" alt="">
                </div>
                <div class="col-md-9">
                    <p class="text"><span class="titles red">Автоматизация процессов.</span><br><br>
                        Автоматизация процессов
                        специализированным программным
                        обеспечением повышает безопасность
                        и минимизирует риски связанные
                        с человеческим фактором.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="advantages hidden-xs hidden-sm">
    <div class="container">
        <div class="header">
            <h2>Преимущества членства в клубе.</h2>
        </div>
        <div class="logotype col-md-5 col-lg-5">
            <img src="img/logo-main-new.png" alt="">
        </div>
        <div class="items col-md-7 col-lg-7">
            <div class="item fadeInRightBig wow" data-wow-delay="0.5s" data-wow-duration="1.5s">
                <div class="icon"><img src="img/advantages-item.png" alt=""></div>
                <div class="description">
                    <span class="gold">Во-первых:</span> Становясь членом нашего клуба, вы экономите своё время и
                    свои средства, так как торговля на криптовалютах с использованием
                    сигналов занимает незначительное время и приносит вам безопасный и
                    стабильный доход, а время на обучение займет не более <span class="red">2-х часов.</span>
                </div>
            </div>
            <div class="item fadeInRightBig wow" data-wow-delay="0.5s" data-wow-duration="1.5s">
                <div class="icon"><img src="img/advantages-item.png" alt=""></div>
                <div class="description">
                    <span class="gold">Во-вторых:</span> Вступая в наш клуб, вы получаете доступ к платным сервисам
                    нашего телеграм помощника, получая <span class="red">все</span> необходимые <span class="red">инструменты</span>
                    для
                    успешной торговли на криптовалютном рынке.
                </div>
            </div>
            <div class="item fadeInRightBig wow" data-wow-delay="0.5s" data-wow-duration="1.5s">
                <div class="icon"><img src="img/advantages-item.png" alt=""></div>
                <div class="description">
                    <span class="gold">В-третьих:</span> Мы индивидуально консультируем каждого члена нашего клуба и,
                    при необходимости, <span class="red">обучаем бесплатно</span> торговле на бирже, составляем
                    инвестиционный портфель, даем рекомендации.
                </div>
            </div>
            <div class="item fadeInRightBig wow" data-wow-delay="0.5s" data-wow-duration="1.5s">
                <div class="icon"><img src="img/advantages-item.png" alt=""></div>
                <div class="description">
                    <span class="gold">В-четвёртых:</span> Своевременно даём рекомендации (сигналы) по точке входа,
                    и цели на выход. Используя наши сигналы, вы
                    максимально <span class="red">безопасно
                        торгуете</span> на бирже и <span class="red">минимизируете</span> свои <span
                            class="red">риски.</span>
                </div>
            </div>
            <div class="item fadeInRightBig wow" data-wow-delay="0.5s" data-wow-duration="1.5s">
                <div class="icon"><img src="img/advantages-item.png" alt=""></div>
                <div class="description">
                    <span class="gold">В-пятых:</span> Одними из первых вы узнаёте <span
                            class="red">о новостях на рынке</span> и еженедельно
                    получаете развернутый <span class="red">технический анализ</span> различных криптовалют.
                </div>
            </div>
            <div class="item fadeInRightBig wow" data-wow-delay="0.5s" data-wow-duration="1.5s">
                <div class="icon"><img src="img/advantages-item.png" alt=""></div>
                <div class="description">
                    <span class="gold">В-шестых:</span> Вы не только получаете доступ ко всем инструментам,
                    необходимым для успешной торговли на рынке критовалют, а так же
                    <span class="red">становитесь частью команды,</span> с которой вы всегда сможете
                    посоветоваться и пообщаться в закрытом телеграм канале.
                </div>
            </div>
            <div class="item fadeInRightBig wow" data-wow-delay="0.5s" data-wow-duration="1.5s">
                <div class="icon"><img src="img/advantages-item.png" alt=""></div>
                <div class="description">
                    <span class="gold">В-седьмых:</span>Торговля с использованием сигналов занимает <span class="red">мало времени,</span>
                    и доступна с <span class="red">мобильных устройств.</span> Вы можете создать
                    дополнительный доход на криптовалютах не прилагая больших усилий и не беспокоясь о своих
                    инвестициях.
                </div>
            </div>
        </div>
        <div class="description-content col-md-12 col-lg-12 fadeInUpBig wow" data-wow-delay="1s"
             data-wow-duration="1.5s">
            <p>
                <span class="red">Будьте осторожны !</span> Источники, предоставляющие бесплатные сигналы и пампы -
                <span class="red">не безопасны!</span> Как правило, перед появлением такой информации, производится
                предварительная закупка криптовалюты и уже затем, после того как сигнал публикуют в новостных лентах,
                чатах и каналах, «хомяки»* провоцируют повышения курса, покупая данную валюту. Когда цена валюты
                возрастает, её продают по заранее созданным ордерам, после чего её цена откатывается к прежним
                показателям или уходит в дамп, а у «хомяков» - зависает «мертвым» грузом в инвестиционном портфеле.
            </p>
            <p>
                <span class="red">*</span>Хомяк - начинающий биржевый игрок, сильно подверженный массовой панике,
                регулярно сливающий и закупающий криптовалюту в самые неудачные моменты, не учитывающий особенностей
                рынка, анализа и прогнозирования.
            </p>
        </div>
    </div>
</div>
<div class="communications centered" id="communications">
    <div class="container">
        <div class="video-height1">
            <video autoplay="autoplay" loop="loop" preload="auto">
                <source src="img/tumannosti-loop.mp4">
            </video>
        </div>
        <div class="header fadeInUpBig wow">
            <h2>ВСЕГДА НА СВЯЗИ!</h2>
        </div>
        <div class="description clearfix">
            <div class="telegram hidden-xs hidden-sm">Мы всегда на связи и используем один из самых удобных мессенджеров
                - <span
                        class="red">Telegram</span></div>
            <div class="chat hidden-xs hidden-sm">Если у вас возникли какие-то вопросы, вы можете связаться с нами с
                помощью <span
                        class="red">Skype</span> или по <span class="red">горячей линии</span>.
            </div>
            <div class="items col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
                <div class="item col-md-4 col-lg-4 col-xs-4 col-sm-4 fadeInUpBig wow" data-wow-delay="0.5s">
                    <div class="icon"><a href="tg://resolve?domain=bitstarclub_bot"><img src="img/on-connect-1.png" alt=""></a></div>
                    <div class="name">Telegram</div>
                    <div class="text">напиши нам в Telegram!</div>
                </div>
                <div class="item col-md-4 col-lg-4 col-xs-4 col-sm-4 fadeInUpBig wow" data-wow-delay="0.7s">
                    <div class="icon"><a href="#"><img src="img/on-connect-2.png" alt=""></a></div>
                    <div class="name">Online chat</div>
                    <div class="text">или здесь - на сайте!</div>
                </div>
                <div class="item col-md-4 col-lg-4 col-xs-4 col-sm-4 fadeInUpBig wow" data-wow-delay="0.9s">
                    <div class="icon"><a href="#"><img src="img/on-connect-3.png" alt=""></a></div>
                    <div class="name">Телефон горячей линии</div>
                    <div class="text">+8(800) 555-35-55</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="conditions centered" id="conditions">
    <div class="container">
        <p class="title">УСЛОВИЯ ЧЛЕНСТВА.</p>
        <div class="row">
            <div class="col-md-3 col-xs-3 col-sm-3 wow fadeInLeft" data-wow-delay="0.5s">
                <!--<p class="condition-number wow fadeIn" data-wow-duration="4s">1</p>-->
                <div class="ripples wow">
                    <div class="circle1 wow"></div>
                </div>
                <img src="img/cap.png" alt="" class="conditions-icons">
                <p class="text hidden-xs hidden-sm">Зарегистрироваться на
                    нашем сайте и пройти
                    <span class="red">бесплатное обучение.</span><span class="red">*</span></p>
                <p class="text hidden-md hidden-lg">Зарегистрироваться на
                    нашем сайте</p>
            </div>
            <div class="col-md-1 col-xs-1 col-sm-1 wow fadeInLeft" data-wow-delay="0.8s">
                <img src="img/conditions-arrow.png" alt="" class="conditions-arrow">
            </div>
            <div class="col-md-3 col-xs-3 col-sm-3 wow fadeInLeft" data-wow-delay="1s">
                <!--<p class="condition-number wow fadeIn" data-wow-duration="4s">2</p>-->
                <div class="ripples wow">
                    <div class="circle2 wow"></div>
                    <div class="circle3 wow"></div>
                </div>
                <img src="img/money.png" alt="" class="conditions-icons">
                <p class="text hidden-xs hidden-sm">Выбрать тариф который
                    отвечает вашим запросам и
                    <span class="red">внести членский взнос.</span>
                </p>
                <p class="text hidden-md hidden-lg">Выбрать тариф</p>
            </div>
            <div class="col-md-1 col-xs-1 col-sm-1 wow fadeInLeft" data-wow-delay="1.4s">
                <img src="img/conditions-arrow.png" alt="" class="conditions-arrow">
            </div>
            <div class="col-md-3 col-xs-3 col-sm-3 wow fadeInLeft" data-wow-delay="1.6s">
                <!--<p class="condition-number wow fadeIn" data-wow-duration="4s">3</p>-->
                <div class="ripples wow">
                    <div class="circle4 wow"></div>
                    <div class="circle5 wow"></div>
                    <div class="circle6 wow"></div>
                </div>
                <img src="img/robot-bot.png" alt="" class="conditions-icons">
                <p class="text hidden-xs hidden-sm">Подключить нашего
                    <span class="red">telegram-помощника,</span>
                    который обладает полным
                    пакетом инструментов
                    <span class="red">для успешной торговли
                        на бирже.</span></p>
                <p class="text hidden-md hidden-lg">Подключить нашего
                    telegram-помощника</p>
            </div>
        </div>
        <p class="cond-footer wow fadeIn hidden-xs hidden-sm" data-wow-delay="1s"><span class="red">*</span> - Данная
            часть пункта не
            обязательна трейдерам, имеющим
            базовые навыки торговли на бирже криптовалют</p>
    </div>
</div>
<div class="accession centered" id="accession">
    <div class="cloudBackground">
        <div class="container">
            <div class="header fadeInUpBig wow hidden-xs hidden-sm">
                <h2>Желаете присоединиться к закрытому трейдерскому клубу?</h2>
            </div>
            <div class="description fadeInUpBig wow"><span class="red">Вступай в наш клуб, зарабатывай с нами!</span>
            </div>
            <div class="button-start fadeInUpBig wow">
                <a href="#rates" class="btn-accession">Присоединиться</a>
            </div>
        </div>
    </div>
</div>
<div class="rates centered" id="rates">
    <div class="container">
        <div class="description fadeInUpBig wow" data-wow-duration="2s">
            <p>Членские взносы</p>
        </div>
        <div class="items col-md-12 col-lg-12">
            <div class="item col-md-3 col-lg-3 fadeIn wow" data-wow-delay="0.6s">
                <table border="0">
                    <tr>
                        <th>Standart</th>
                    </tr>
                    <tr>
                        <td>
                            <span class="summ">5000</span><img src="img/valuta.png" alt="" class="valuta">
                            <p>1 месяц</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Личный кабинет</td>
                    </tr>
                    <tr>
                        <td>Сигналы</td>
                    </tr>
                    <tr>
                        <td>Составление инвестиционного портфеля</td>
                    </tr>
                    <tr>
                        <td>Консультирование / поддержка</td>
                    </tr>
                    <tr>
                        <td>Новости криптовалют</td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#myModal" name="btnStandart"
                                    class="btn-join">Присоединиться
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="item col-md-3 col-lg-3 fadeIn wow" data-wow-delay="0.8s">
                <table border="0" class="second">
                    <tr>
                        <th>VIP</th>
                    </tr>
                    <tr>
                        <td>
                            <span class="summ">30000</span><img src="img/valuta.png" alt="" class="valuta">
                            <p>безлимит</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Личный кабинет</td>
                    </tr>
                    <tr>
                        <td>Сигналы</td>
                    </tr>
                    <tr>
                        <td>Составление инвестиционного портфеля</td>
                    </tr>
                    <tr>
                        <td>Консультирование / поддержка</td>
                    </tr>
                    <tr>
                        <td>Новости криптовалют</td>
                    </tr>
                    <tr>
                        <td>Поиск перспективных ICO</td>
                    </tr>
                    <tr>
                        <td>Разработка ПО для автоматизации торговли на бирже</td>
                    </tr>
                    <tr>
                        <td>Доступ к закрытому телеграм-каналу</td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#myModal" name="btnVip"
                                    class="btn-join">Присоединиться
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="item col-md-3 col-lg-3 fadeIn wow" data-wow-delay="1s">
                <table border="0">
                    <tr>
                        <th>Premium</th>
                    </tr>
                    <tr>
                        <td>
                            <span class="summ">12000</span><img src="img/valuta.png" alt="" class="valuta">
                            <p>3 месяца</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Личный кабинет</td>
                    </tr>
                    <tr>
                        <td>Сигналы</td>
                    </tr>
                    <tr>
                        <td>Составление инвестиционного портфеля</td>
                    </tr>
                    <tr>
                        <td>Консультирование / поддержка</td>
                    </tr>
                    <tr>
                        <td>Новости криптовалют</td>
                    </tr>
                    <tr>
                        <td>Поиск перспективных ICO</td>
                    </tr>
                    <tr>
                        <td>Доступ к закрытому телеграм-каналу</td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#myModal" name="btnPremium"
                                    class="btn-join">Присоединиться
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="item col-md-3 col-lg-3 fadeIn wow" data-wow-delay="1s">
                <table border="0" style="position:relative; top: 70px;">
                    <tr>
                        <th>Econom</th>
                    </tr>
                    <tr>
                        <td>
                            <span class="summ">2000</span><img src="img/valuta.png" alt="" class="valuta">
                            <p>1 месяца</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Личный кабинет</td>
                    </tr>
                    <tr>
                        <td>Составление инвестиционного портфеля</td>
                    </tr>
                    <tr>
                        <td>Консультирование / поддержка</td>
                    </tr>
                    <tr>
                        <td>Новости криптовалют</td>
                    </tr>
                    <tr>
                        <td>
                            <?php if (isset($_SESSION['id'])) {
                            $id_ses = $_SESSION['id']; ?>
                                <a href="lk" name="btnPremium"
                                   class="btn-join">Присоединиться
                                </a>
                            <?php } else { ?>
                                <button type="button" data-toggle="modal" data-target="#myModal" name="btnPremium"
                                        class="btn-join">Присоединиться
                                </button>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="parthners centered" id="parthners">
    <div class="cloudBackground">
        <div class="container">
            <div class="header fadeInUpBig wow">
                <h2>Партнёры.</h2>
            </div>
            <div class="items col-md-12 col-lg-12">
                <div class="item col-md-4 col-lg-4 col-xs-4 col-sm-4 fadeInUpBig wow" data-wow-delay="0.5s">
                    <a href="https://www.binance.com" target="_blank"><img src="img/bihance1.png" alt=""></a>
                </div>
                <div class="item col-md-4 col-lg-4 col-xs-4 col-sm-4 fadeInUpBig wow" data-wow-delay="0.8s">
                    <a href="https://bestchange.ru" target="_blank"><img src="img/partners-best.png" alt=""></a>
                </div>
                <div class="item col-md-4 col-lg-4 col-xs-4 col-sm-4 fadeInUpBig wow" data-wow-delay="1.1s">
                    <a href="https://exmo.com" target="_blank"><img src="img/partners-exmo.png" alt=""></a>
                </div>
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
                <!-- VK Widget -->
                <div id="vk_groups" class="hidden-xs hidden-sm"></div>
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
<?php } ?>
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
<script async>
    $(document).ready(function () {
        $('.mobile_menu').click(function () {
            console.log("1111");
            $(".mobile_menu ul").slideToggle("slow");
        });
    });
</script>
<!-- login modal -->
<?php require_once "template/login_popup.php"; ?>
<script>
    jQuery(document).ready(function ($) {
        var nav = $('.my-menu');
        $(window).scroll(function () {
            if ($(this).scrollTop() > 870) {
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
<script type="text/javascript" src="//vk.com/js/api/openapi.js?153"></script>
<script type="text/javascript">
    VK.Widgets.Group("vk_groups", {mode: 3, width: "300"}, 156978466);
</script>
</body>
</html>
