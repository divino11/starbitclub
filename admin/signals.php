<?php
session_start();
require_once '../db.php';
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
    <link rel="stylesheet" href="admin.css">
    <title>Админ-панель | Редактировать новость</title>
</head>
<body>
<div class="reg-page">
    <?php require_once "../template/menu-admin.php"; ?>
</div>
<div class="form-reg">
    <div class="container">
        <img src="../img/benefits-logo.png" class="logo-reg" alt="">
        <div class="form-white-reg">
            <div class="default-field">
                <div class="row">
                    <div class="col-md-6">
                        <a href="longsignal.php" class="btn-primary btnAdmin">Долгосрочные сигналы</a>
                    </div>
                    <div class="col-md-6">
                        <a href="shortsignal.php" class="btn-primary btnAdmin">Короткие сигналы</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
