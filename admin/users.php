<?php
require_once "../db.php";
session_start();
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
    <title>Админ-панель | Пользователи</title>
    <style>
        body > * {
            color: #fff;
        }
    </style>
</head>
<body>
<div class="reg-page">
    <?php require_once "../template/menu-admin.php"; ?>
</div>
<div class="form-reg">
    <div class="container">
        <img src="../img/benefits-logo.png" class="logo-reg" alt="">
        <div class="form-white-reg">
            <div class="admin-news">
                <div class="row">
                    <div class="col-md-2"><p>id</p></div>
                    <div class="col-md-2"><p>Фамилия</p></div>
                    <div class="col-md-2"><p>Имя</p></div>
                    <div class="col-md-2"><p>Телефон</p></div>
                    <div class="col-md-2"><p>Email</p></div>
                    <div class="col-md-2"><p>Дата регистрации</p></div>
                    <?php
                    $query = 'SELECT * FROM `auth`';
                    $result = mysqli_query($link, $query); //ответ базы запишем в переменную $result
                    while ($user = mysqli_fetch_array($result)) {
                        $lastname = $user['lastname'];
                        $firstname = $user['firstname'];
                        $email = $user['email'];
                        $phone = $user['phone'];
                        $date = $user['date'];
                        $id = $user['id'];
                        ?>
                        <div class="col-md-2"><p><?php echo $id; ?></p></div>
                        <div class="col-md-2"><p><?php echo $lastname; ?></p></div>
                        <div class="col-md-2"><p><?php echo $firstname; ?></p></div>
                        <div class="col-md-2"><p><?php echo $phone; ?></p></div>
                        <div class="col-md-2"><p><?php echo $email; ?></p></div>
                        <div class="col-md-2"><p><?php echo $date; ?></p></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
