<?php
session_start();
require_once 'db.php';
mysqli_set_charset($link, 'utf8');
if (isset($_POST['register_btn'])) {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email-reg'];
    $pass = $_POST['pas-reg'];
    $rePass = $_POST['re-pas-reg'];
    if ($pass == $rePass) {
        $sql = mysqli_query($link, "INSERT INTO `auth` (`lastname`, `firstname`, `email`, `password`) 
                        VALUES ('$lastname', '$firstname', '$email', '$pass')");
        mail(
            $email,
            'Поздравляем с регистрацией',
            '<html><body><div style="width: 500px; margin: auto; display: block;">
    <table align="center" style="background-color: #000; color: #fff;">
        <tr style="text-align: center;">
            <th><img style="width: 80px;" src="https://starbitclub.com/img/logo-letter.png" alt=""></th>
            <th style="text-transform: uppercase;"><a href="https://starbitclub.com/" style="color: #C2900B; text-decoration: none;">Главная</a>
            </th>
            <th style="text-transform: uppercase;"><a style="color: #C2900B; text-decoration: none;" href="https://starbitclub.com/">О нас</a>
            </th>
            <th style="text-transform: uppercase;"><a style="color: #C2900B; text-decoration: none;" href="https://starbitclub.com/posts.php">Новости</a>
            </th>
        </tr>
        <tr>
            <td colspan="4" align="center" style="font-size: 36px; padding-top: 20px; padding-bottom: 20px; color: #C2900B;">Поздравляем</td>
        </tr>
        <tr>
            <td colspan="4" align="center"><img style="width: 100px;" src="https://starbitclub.com/img/people-letter.png"
                                                alt=""></td>
        </tr>
        <tr>
            <td colspan="4" align="center" style="padding-top: 20px;  text-transform: uppercase; font-size: 22px;">Вы выполнили <span style="color: #d40537;">1</span> из 3 условий членства.</td>
        </tr>
        <tr>
            <td colspan="4" align="center" style="padding-top: 10px; padding-bottom: 30px;">Теперь вам доступен <span style="color:#d40537; font-size: 20px">бесплатный видеокурс</span><br>
                по основам трейдинга и криптовалютным биржам.
            </td>
        </tr>
        <tr>
            <td colspan="4" align="center" style="padding-bottom: 30px;">
                <a href="https://starbitclub.com/lk.php" style="border: 1px solid #d40537; padding: 15px; width: 200px; text-transform: uppercase; font-weight: 700; color: #fff; text-decoration: none;">Видеокурс</a>
            </td>
        </tr>
        <tr>
            <td colspan="4" align="center" style="font-size: 18px;">Если же вы готовы к торговле, то перейдем к <span style="color:#d40537;">следующему условию.</span>
            </td>
        </tr>
        <tr>
            <td colspan="4" align="center" style="font-size: 18px;">Для этого зайдите в свой кабинет.</td>
        </tr>
        <tr>
            <td colspan="4" align="center" style="padding-top: 30px; padding-bottom: 30px;">
                <a href="https://starbitclub.com/lk.php" style="border: 1px solid #d40537; padding: 15px; width: 200px; text-transform: uppercase; font-weight: 700; color: #fff; text-decoration: none;">Войти в кабинет</a>
            </td>
        </tr>
        <tr>
            <td colspan="4" align="center" style="font-size: 18px;">Вступая в наш клуб вы получаете доступ к знаниям и опыту <br>
                всей нашей команды. Не только сухие факты и информацию, <br>
                но и <span style="color:#d40537;">круглосуточную поддержку</span> и советы.
            </td>
        </tr>
        <tr>
            <td colspan="4" align="center" style="font-size: 18px;">Так что начинай с нами свой путь к лучшей жизни.</td>
        </tr>
        <tr>
            <td colspan="4" align="center"><img style="width: 100px; padding-top: 20px; padding-bottom: 20px;" src="https://starbitclub.com/img/planet-letter.png"
                                                alt=""></td>
        </tr>
        <tr>
            <td colspan="4" align="center" style="font-size: 18px; padding-bottom: 20px;">Результат одного из наших сигналов:</td>
        </tr>
        <tr>
            <td colspan="4" align="center"><img style="width: 100%;" src="https://starbitclub.com/img/crypto-letter.png"
                                                alt=""></td>
        </tr>
    </table>
</div></body></html>',
            "From: admin@starbitclub.com\r\n"
            . "Content-type: text/html; charset=utf-8\r\n"
            . "X-Mailer: PHP mail script"
        );

        $query = 'SELECT * FROM `auth` WHERE email = "' . $email . '" AND password = "' . $pass . '"';
        $result = mysqli_query($link, $query); //ответ базы запишем в переменную $result
        $user = mysqli_fetch_assoc($result); //преобразуем ответ из БД в нормальный массив PHP

        if (!empty($user)) {
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['pass'] = $user['password'];
            $_SESSION['date'] = $user['date'];
            $_SESSION['id'] = $user['id'];
            $congrats = "Регистрация прошла успешно. Поздравляем! Проверьте почту!";

            echo '<script>window.location.replace("/lk");</script>';
        }
    } else {
        $bad_pas = "Пароли не совпадают!";
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Регистрация нового пользователя</title>
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
                <div class="col-md-12">
                    <p class="reg-title">Регистрация</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="col-md-5">
                        <label for="lastname" class="label-reg">Фамилия</label>
                        <label for="firstname" class="label-reg">Имя</label>
                        <label for="email-reg" class="label-reg">E-mail</label>
                        <label for="pas-reg" class="label-reg">Пароль</label>
                        <label for="re-pas-reg" class="label-reg">Подтвердите пароль</label>
                    </div>
                    <div class="col-md-7">
                        <form action="registration" method="post">
                            <input type="text" required minlength="3" class="field-reg" name="lastname" id="lastname">
                            <input type="text" required minlength="3" class="field-reg" name="firstname" id="firstname">
                            <input type="email" required minlength="5" class="field-reg" name="email-reg"
                                   id="email-reg">
                            <input type="password" required minlength="6" class="field-reg" name="pas-reg" id="pas-reg">
                            <input type="password" required minlength="6" class="field-reg" name="re-pas-reg"
                                   id="re-pas-reg">
                            <div class="rotateleft"><input type="checkbox" required class="check-reg"> <span
                                        class="confirm-user">Я ознакомлен и согласен с условиями <a
                                            href="#" class="confirm-trust">Пользовательского соглашения</a> и <a
                                            href="#"
                                            class="confirm-trust">Политики конфиденциальности</a></span></div>
                            <button class="reg-btn" name="register_btn" type="submit">Зарегистрироваться</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="img/chel.png" class="reg-img" alt="">
                </div>
            </div>
            <?php if (isset($_POST['register_btn'])) { ?>
                <p style="color: #40e640; text-align: center; font-size: 24px; padding-top: 110px; margin-bottom: -100px;"><?php echo $congrats; ?></p>
                <p style="color: red; text-align: center; font-size: 24px; padding-top: 110px; margin-bottom: -100px;"><?php echo $bad_pas; ?></p>
            <?php } ?>
        </div>
    </div>
</div>
<div class="footer-reg footer-second centered">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
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
    })(window, document, 'https://cdn.bitrix24.ru/b6717263/crm/site_button/loader_1_e8zej7.js');
</script>
</body>
</html>
