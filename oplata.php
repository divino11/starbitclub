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
    <script src="../js/device.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Оплата услуг</title>
</head>
<body>
<div class="reg-page">
    <?php require_once "template/menu-admin.php"; ?>
</div>
<div class="form-reg">
    <div class="container">
        <img src="img/benefits-logo.png" class="logo-reg" alt="">
        <div class="form-white-reg">
            <div class="oplata-form">
                <?php if (isset($_GET['standart'])) {?>
                    <form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">
                        <input type="email" placeholder="Ваш email" class="email">
                        <input type="hidden" name="receiver" value="410016136799988">
                        <input type="hidden" name="formcomment" value="Standart доступ к сайту">
                        <input type="hidden" name="short-dest" value="Standart доступ к сайту">
                        <input type="hidden" name="label" value="$order_id">
                        <input type="hidden" name="quickpay-form" value="donate">
                        <input type="hidden" name="targets" value="транзакция {order_id}">
                        <input type="hidden" name="sum" value="5" data-type="number">
                        <input type="hidden" name="comment" value="">
                        <input type="hidden" name="need-fio" value="false">
                        <input type="hidden" name="need-email" value="true">
                        <input type="hidden" name="need-phone" value="false">
                        <input type="hidden" name="need-address" value="false">
                        <!--<label><input type="radio" name="paymentType" value="PC">Яндекс.Деньгами</label>
                        <label><input type="radio" name="paymentType" value="AC">Банковской картой</label>-->
                        <input type="submit" value="Присоединиться">
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
