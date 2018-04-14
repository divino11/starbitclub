<?php
session_start();
require_once "db.php";
header('Content-Type: text/html; charset=utf-8');
$lastname = $_SESSION['lastname'];
$firstname = $_SESSION['firstname'];
$email = $_SESSION['email'];
$pass = $_SESSION['pass'];
$date = $_SESSION['date'];
$id_ses = $_SESSION['id'];
$query = 'SELECT * FROM `auth` WHERE id = "' . $id_ses . '"';
$result = mysqli_query($link, $query); //ответ базы запишем в переменную $result
$user = mysqli_fetch_assoc($result); //преобразуем ответ из БД в нормальный массив PHP

if (!empty($user)) {
    $lastname = $user['lastname'];
    $firstname = $user['firstname'];
    $phone = $user['phone'];
    $email = $user['email'];
    $password = $user['password'];
    $date = $user['date'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="js/device.js"></script>
    <!-- Put this script tag to the <head> of your page -->
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?152"></script>
    <script type="text/javascript">
        VK.init({apiId: 6440159, onlyWidgets: true});
    </script>
    <link rel="stylesheet" href="css/lk.css">
    <link rel="stylesheet" href="css/animate.css">
    <script src="js/wow.js"></script>
    <script>
        new WOW().init();
    </script>
</head>
<style>
    .video-height {
        display: block;
        width: 100%;
        height: 100%;
        overflow: hidden;
        position: absolute;
        left: 0;
        border-radius: 0 0 10px 10px;
    }

    video {
        display: block;
        width: 100%;
    }

    .footer-reg {
        padding-top: 70px;
    }
</style>
<body>
<script>
    $(document).ready(function () {
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
    });
</script>

<?php
if (empty($id_ses)) {
    $error_login = "ВАМ ЗАКРЫТ ДОСТУП В ТРЕЙДЕРСКИЙ КЛУБ!!! <br> <a href='#' data-toggle='modal' data-target='#myModal' class='change-data'>Войти в кабинет</a>";
    echo '
    <style>
        #home, #menu1, #menu2, #menu3, #menu4, #menu5 {
            display: none !important;
        }
    </style>
    ';
}
?>
<?php require_once "template/login_popup.php"; ?>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="logo-field">
                <a href="/"><img class="logo-lk" src="img/logo-main-new.png" alt=""></a>
            </div>
            <ul>
                <li><a href="#"><img class="header-lk-social" src="img/insta.png" alt=""></a></li>
                <li><a href="#"><img class="header-lk-social" src="img/yt.png" alt=""></a></li>
                <li><a href="#"><img class="header-lk-social" src="img/vk.png" alt=""></a></li>
            </ul>
            <!--<p class="hotline">Телефон горячей линии<br>+8(800) 555-35-55</p>-->
        </div>
    </div>
</div>
<div class="tabs">
    <div class="container">
        <img src="img/tip1.png" class="tip1" style="display: none;" alt="">
        <img src="img/tip2.png" class="tip2" style="display: none;" alt="">
        <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#home">Успешный старт</a></li>
            <li class="active"><a data-toggle="tab" href="#menu1">Вступить в клуб</a></li>
            <li><a data-toggle="tab" href="#menu2">Мой аккаунт</a></li>
            <li><a href="/posts" target="_blank">Новости</a></li>
            <li><a data-toggle="tab" href="#menu4">Отзывы</a></li>
            <li><a data-toggle="tab" href="#menu5">Разработка ПО</a></li>
        </ul>
        <div class="tab-content">
            <div class="video-height">
                <video autoplay="autoplay" loop="loop" preload="auto" muted>
                    <source src="img/tumannosti-loop.mp4">
                </video>
            </div>
            <p style="text-align: center; font-size: 24px; color: red; position: relative; padding-top: 30px;"><?php echo $error_login; ?></p>
            <div id="home" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-4 centered">
                        <iframe class="s-video" width="100%" height="auto"
                                src="https://www.youtube.com/embed/5zcdvsFIPfM" frameborder="0"
                                allowfullscreen=""></iframe>
                    </div>
                    <div class="col-md-4 centered">
                        <iframe class="s-video" width="100%" height="auto"
                                src="https://www.youtube.com/embed/d2An6lqMxrc" frameborder="0"
                                allowfullscreen=""></iframe>
                    </div>
                    <div class="col-md-4 centered">
                        <iframe class="s-video" width="100%" height="auto"
                                src="https://www.youtube.com/embed/_Qr68zFRgaE" frameborder="0"
                                allowfullscreen=""></iframe>
                    </div>
                    <div class="last-quest">
                        <p>Остались вопросы?</p>
                        <button class="consult">Консультация</button>
                    </div>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade in active">
                <div id="first-step">
                    <div class="row">
                        <div class="col-md-12 centered">
                            <!--<img src="img/logo-join.png" class="logo-join" alt="">-->
                            <img src="img/line1.png" class="line1" alt="">
                            <p class="desc-join">Для того чтобы стать членом клуба необходимо выполнить 4 простых
                                условия:</p>
                            <p class="lets-join">Пройти бесплатное обучение<span class="red">*</span><br>
                                <span class="red">*</span> <span class="desc">- Данный пункт не обязателен трейдерам, имеющим базовые навыки торговли на бирже криптовалют</span>
                            </p>
                            <img src="img/rocket-join.png" class="rocket" alt=""><br>
                            <button class="ready" id="step1">Готово</button>
                        </div>
                    </div>
                </div>
                <div id="second-step" style="display: none">
                    <div class="col-md-12 centered">
                        <!--<img src="img/logo-join.png" class="logo-join" alt="">-->
                        <img src="img/line2.png" class="line2" alt="">
                        <p class="desc-join">Подключить Telegram-помощник</p>
                        <img src="img/bot.png" class="bots" alt="">
                        <a href="tg://resolve?domain=bitstarclub_bot"><img src="img/click-me.png" class="click-me wow fadeIn" data-wow-delay="5s" alt=""></a><br>
                        <button class="ready" id="step2">Готово</button>
                    </div>
                </div>
                <div id="third-step" class="centered" style="display: none">
                    <!--<img src="img/logo-join.png" class="logo-join" alt="">-->
                    <img src="img/line3.png" class="line3" alt="">
                    <p class="desc">Вам необходимо произвести оплату членского взноса<br>
                        <span class="dark-red">но</span>, прежде чем вносить членский взнос вам необходимо узнать свой
                        ID в нашем
                        telegram-помощнике</p>
                    <div class="row">
                        <div class="col-md-8">
                            <img src="img/notebook.png" class="notebook" alt="">
                        </div>
                        <div class="col-md-4">
                            <ul>
                                <li>Зайти в нашего telegram бота и нажать команду «Запустить бота»</li>
                                <li>После нажмите команду «Начать работу» и бот пришлет вам ваш ID</li>
                                <li>ID необходимо указать в комментарии при оплате членского взноса</li>
                            </ul>
                        </div>
                    </div>
                    <form id="telegram_form">
                        <input type="hidden" value="<?php echo $id_ses ?>" name="my_id">
                        <input type="tel" name="telegram_id" class="field__telegramId" id="telegram__id" required placeholder="Введите ваш id телеграмма">
                        <button class="ready" type="submit" id="step3">Готово</button>
                    </form>
                </div>
                <div id="four-step" class="centered" style="display: none">
                    <!--<img src="img/logo-join.png" class="logo-join" alt="">-->
                    <img src="img/line4.png" class="line4" alt="">
                    <p class="desc">Оплата членского взноса. Выберите желаемый тариф<span class="dark-red">*</span></p>
                    <div class="row">
                        <div class="item col-md-4 col-lg-4">
                            <table border="1">
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
                                    <td>Доступ к закрытому телеграм-каналу</td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#oplataStandart" name="btnStandart" class="btn-join">Оплатить</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="item col-md-4 col-lg-4">
                            <table border="1" class="second">
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
                                        <button type="button" data-toggle="modal" data-target="#oplataVip" name="btnVip" class="btn-join">Оплатить</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="item col-md-4 col-lg-4">
                            <table border="1">
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
                                        <button type="button" data-toggle="modal" data-target="#oplataPremium" name="btnPremium" class="btn-join">Оплатить</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <p class="new-people"><span class="dark-red">*</span>Своим новым членам мы рекомендуем базовый тариф
                        - «Standart»</p>
                    <!--<button class="ready">Я оплатил</button>-->
                </div>
            </div>
            <div id="menu2" class="tab-pane fade centered">
                <p class="title">Данные пользователя</p>
                <form id="changeProfile">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="field-change" style="display: none;" name="id" value="<?php echo $id_ses; ?>">
                        <p class="name-change-field">Фамилия:</p>
                        <input type="text" class="field-change" name="lastname"  value="<?php echo $lastname; ?>">
                        <p class="name-change-field">Имя:</p>
                        <input type="text" class="field-change" name="firstname"  value="<?php echo $firstname; ?>">
                        <p class="name-change-field">Email:</p>
                        <input type="email" class="field-change" name="email-reg"  value="<?php echo $email; ?>">
                        <p class="name-change-field">Телефон:</p>
                        <input type="text" class="field-change" name="phone"  value="<?php echo $phone; ?>">
                        <p class="name-change-field">Дата регистрации:</p>
                        <input type="text" class="field-change" disabled value="<?php echo $date; ?>">
                    </div>
                    <div class="col-md-6">
                        <p class="name-change-field">Пароль:</p>
                        <input type="password" class="field-change" name="pas-reg" value="<?php echo $pass; ?>">
                    </div>
                    <div class="resultChange" style="z-index: 99999999; position:relative; color: #00c700;"></div>
                </div>
                <button class="change-data" type="submit">Изменить</button>
                </form>
            </div>
            <div id="menu3" class="tab-pane fade">
                <p class="news">Новости</p>
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM `news` ORDER BY id DESC";
                    mysqli_set_charset($link, 'utf8');
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $id = $row['id'];
                        $img = $row['img'];
                        $title = $row['title'];
                        ?>
                        <div class="col-md-3">
                            <a href="/news?id=<?php echo $id; ?>"><img src="/news-img/<?php echo $img; ?>"
                                                                           class="img-news"></a><br>
                            <p class="centered"><a href="/news?id=<?php echo $id; ?>"
                                                   class="title-news"><?php echo $title; ?></a></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div id="menu4" class="tab-pane fade centered">
                <p class="title">Оставьте отзыв о нашем клубе</p>
                <p class="desc">Мы будем благодарны вам за любой комментарий, отзыв, или идею</p>
                <textarea class="textfield" name="" id="" cols="30" rows="10"
                          placeholder="Написать отзыв..."></textarea><br>
                <button class="ready">Написать</button>

                <p class="vk-review">Вы можете оставить свой комментарий в Вконтакте</p>
                <!-- Put this div tag to the place, where the Comments block will be -->
                <div id="vk_comments"></div>
                <script type="text/javascript">
                    VK.Widgets.Comments("vk_comments", {limit: 15, width: "600", attach: "*"});
                </script>
            </div>
            <div id="menu5" class="tab-pane fade">
                <p class="desc">Данный раздел находится в разработке! Приносим свои извинения!</p>
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
                <a id="contact-us">Контакты</a>
                <p>Телефон горячей линии</p>
                <!--<p><a href="tel:88005553535">+8 (800) 555-35-35</a></p>-->
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
<div class="contactPopup" style="display: none;">
    <div class="popup_contact">
        <a class="close__popup">X</a>
        <p class="desc">Если у вас возникли какие-то вопросы,<br>
            вы всегда можете связаться с нами</p>
        <div class="row centered">
            <div class="col-md-3 col-xs-6 col-sm-6">
                <a href=""><img src="img/telegram.png" class="social" alt=""></a>
                <p class="social-text">Telegram <br>
                    @BTCStarsSupport</p>
            </div>
            <div class="col-md-3 col-xs-6 col-sm-6">
                <a href=""><img src="img/skype.png" class="social" alt=""></a>
                <p class="social-text">Skype:<br>
                    StarBitClub Support</p>
            </div>
            <div class="col-md-3 col-xs-6 col-sm-6">
                <a href=""><img src="img/email.png" class="social" alt=""></a>
                <p class="social-text">E-mail:<br>
                    support@starbitclub.com</p>
            </div>
            <div class="col-md-3 col-xs-6 col-sm-6">
                <a href=""><img src="img/phone.png" class="social" alt=""></a>
                <p class="social-text"></p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="oplataStandart">
    <div class="modal-oplata">
        <div class="modal-dialog">
            <div class="modal-content">
                <button class="close" data-dismiss="modal">×</button>
                <div class="modal-body">
                    <div class="row">
                        <p class="centered check-payment">Выберите способ оплаты:</p>
                        <div class="col-md-3">
                            <a href="https://money.yandex.ru/quickpay/confirm.xml?receiver=410016292538129&quickpay-form=shop&targets=Спасибо%20что%20выбрали%20нас&paymentType=PC&sum=5&amount_due=5&formcomment=standart_level&short-dest=standartt&label=<?php echo $id_ses; ?>"><img src="img/yandex-oplata.jpg" alt="" class="img-oplata"></a>
                        </div>
                        <div class="col-md-3">
                            <a href="https://money.yandex.ru/quickpay/confirm.xml?receiver=410016292538129&quickpay-form=shop&targets=Спасибо%20что%20выбрали%20нас&paymentType=MC&sum=5&amount_due=5&formcomment=standart_level&short-dest=standartt&label=<?php echo $id_ses; ?>"><img src="img/visa-oplata.jpg" alt="" class="img-oplata"></a>
                        </div>
                        <div class="col-md-3">
                            <a href="https://money.yandex.ru/quickpay/confirm.xml?receiver=410016292538129&quickpay-form=shop&targets=Спасибо%20что%20выбрали%20нас&paymentType=AC&sum=5&amount_due=5&formcomment=standart_level&short-dest=standartt&label=<?php echo $id_ses; ?>"><img src="img/master-oplata.jpg" alt="" class="img-oplata"></a>
                        </div>
                        <div class="col-md-3">
                            <a href="#"><img src="img/btc-oplata.jpg" alt="" class="img-oplata"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="oplataVip">
    <div class="modal-oplata">
        <div class="modal-dialog">
            <div class="modal-content">
                <button class="close" data-dismiss="modal">×</button>
                <div class="modal-body">
                    <div class="row">
                        <p class="centered check-payment">Выберите способ оплаты:</p>
                        <div class="col-md-3">
                            <a href="https://money.yandex.ru/quickpay/confirm.xml?receiver=410016292538129&quickpay-form=shop&targets=Спасибо%20что%20выбрали%20нас&paymentType=PC&sum=30000&amount_due=30000&formcomment=vip_level&short-dest=vip&label=<?php echo $id_ses; ?>"><img src="img/yandex-oplata.jpg" alt="" class="img-oplata"></a>
                        </div>
                        <div class="col-md-3">
                            <a href="https://money.yandex.ru/quickpay/confirm.xml?receiver=410016292538129&quickpay-form=shop&targets=Спасибо%20что%20выбрали%20нас&paymentType=MC&sum=30000&amount_due=30000&formcomment=vip_level&short-dest=vip&label=<?php echo $id_ses; ?>"><img src="img/visa-oplata.jpg" alt="" class="img-oplata"></a>
                        </div>
                        <div class="col-md-3">
                            <a href="https://money.yandex.ru/quickpay/confirm.xml?receiver=410016292538129&quickpay-form=shop&targets=Спасибо%20что%20выбрали%20нас&paymentType=AC&sum=30000&amount_due=30000&formcomment=vip_level&short-dest=vip&label=<?php echo $id_ses; ?>"><img src="img/master-oplata.jpg" alt="" class="img-oplata"></a>
                        </div>
                        <div class="col-md-3">
                            <a href="#"><img src="img/btc-oplata.jpg" alt="" class="img-oplata"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="oplataPremium">
    <div class="modal-oplata">
        <div class="modal-dialog">
            <div class="modal-content">
                <button class="close" data-dismiss="modal">×</button>
                <div class="modal-body">
                    <div class="row">
                        <p class="centered check-payment">Выберите способ оплаты:</p>
                        <div class="col-md-3">
                            <a href="https://money.yandex.ru/quickpay/confirm.xml?receiver=410016292538129&quickpay-form=shop&targets=Спасибо%20что%20выбрали%20нас&paymentType=PC&sum=15000&amount_due=15000&formcomment=premium_level&short-dest=premium&label=<?php echo $id_ses; ?>"><img src="img/yandex-oplata.jpg" alt="" class="img-oplata"></a>
                        </div>
                        <div class="col-md-3">
                            <a href="https://money.yandex.ru/quickpay/confirm.xml?receiver=410016292538129&quickpay-form=shop&targets=Спасибо%20что%20выбрали%20нас&paymentType=MC&sum=15000&amount_due=15000&formcomment=premium_level&short-dest=premium&label=<?php echo $id_ses; ?>"><img src="img/visa-oplata.jpg" alt="" class="img-oplata"></a>
                        </div>
                        <div class="col-md-3">
                            <a href="https://money.yandex.ru/quickpay/confirm.xml?receiver=410016292538129&quickpay-form=shop&targets=Спасибо%20что%20выбрали%20нас&paymentType=AC&sum=15000&amount_due=15000&formcomment=premium_level&short-dest=premium&label=<?php echo $id_ses; ?>"><img src="img/master-oplata.jpg" alt="" class="img-oplata"></a>
                        </div>
                        <div class="col-md-3">
                            <a href="#"><img src="img/btc-oplata.jpg" alt="" class="img-oplata"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#contact-us').click(function () {
        $('.contactPopup').css("display", "block");
    });

    $('.close__popup').click(function () {
        $('.contactPopup').css("display", "none");
    });

    $(document).ready(function () {
        $("button#step1").click(function () {
            $("#first-step").hide("slow");
            $("#second-step").show("slow");
        });

        $("button#step2").click(function () {
            $("#second-step").hide("slow");
            $("#third-step").show("slow");
        });

        $("button#step3").click(function () {
            $("#third-step").hide("slow");
            $("#four-step").show("slow");
        });

        $("button#step4").click(function () {
            $("#four-step").hide("slow");
        });
    });

    // после полной загрузки страницы
    $(document).ready(function () {
        // вызываем метод setInterval, который будет вызывать модальное окно каждые 5 минут, если оно не открыто
        setTimeout(function () {
            $(".tip1").show();
        }, 10000)
    });

    // после полной загрузки страницы
    $(document).ready(function () {
        // вызываем метод setInterval, который будет вызывать модальное окно каждые 5 минут, если оно не открыто
        setTimeout(function () {
            $(".tip1").hide();
        }, 20000)
    });

    // после полной загрузки страницы
    $(document).ready(function () {
        // вызываем метод setInterval, который будет вызывать модальное окно каждые 5 минут, если оно не открыто
        setTimeout(function () {
            $(".tip2").show();
        }, 30000)
    });

    // после полной загрузки страницы
    $(document).ready(function () {
        // вызываем метод setInterval, который будет вызывать модальное окно каждые 5 минут, если оно не открыто
        setTimeout(function () {
            $(".tip2").hide();
        }, 35000)
    });
</script>
<script>
    $("#telegram_form").submit(function () {
            $.ajax({
                type: "POST",
                url: "insertTelegramId.php", //Change
                data: $("#telegram_form").serialize(),
                success: function success(data) {
                    console.log('success!');
                }
            });
            return false;
        });

    document.getElementById('telegram__id').onkeypress = function (e) {
        return !(/[А-Яа-яA-Za-z ]/.test(String.fromCharCode(e.charCode)));
    }
</script>
<script>
    $("#changeProfile").submit(function () {
        $.ajax({
            type: "POST",
            url: "changeProfileAjax.php", //Change
            data: $("#changeProfile").serialize(),
            success: function success(data) {
                console.log('success!');
                $(".resultChange").text('Данные успешно измененны!');
            }
        });
        return false;
    });
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117114324-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-117114324-1');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter48373727 = new Ya.Metrika({
                    id:48373727,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/48373727" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script data-skip-moving="true">
    (function(w,d,u){
        var s=d.createElement('script');s.async=1;s.src=u+'?'+(Date.now()/60000|0);
        var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    })(window,document,'https://cdn.bitrix24.ru/b6766487/crm/site_button/loader_2_7nsjuk.js');
</script>
</body>
</html>
