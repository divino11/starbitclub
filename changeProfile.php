<?php
session_start();
require_once "db.php";
mysqli_set_charset($link, 'utf8');
$id = $_GET['id'];

if (isset($id)) {
    $query = 'SELECT * FROM `auth` WHERE id = "' . $id . '"';
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
    <script src="js/device.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Изменение личных данных</title>
    <style>
        .oplata-form {
            padding-top: 40px;
        }
    </style>
</head>
<body>
<div class="reg-page">
    <?php require_once "template/menu.php"; ?>
</div>
<div class="form-reg">
    <div class="container">
        <img src="img/logo-main-new.png" class="logo-reg" alt="">
        <div class="form-white-reg">
            <div class="oplata-form">
                <div class="row">
                    <div class="col-md-9">
                        <form id="changeProfile">
                            <input type="text" class="field-reg" value="<?php echo $id; ?>" name="id" id="id">
                            <input type="text" required minlength="3" class="field-reg" placeholder="Ваша фамилия"
                                   value="<?php echo $lastname; ?>" name="lastname" id="lastname">
                            <input type="text" required minlength="3" class="field-reg" placeholder="Ваше имя"
                                   value="<?php echo $firstname; ?>" name="firstname" id="firstname">
                            <input type="email" required minlength="5" class="field-reg" placeholder="Ваш email"
                                   value="<?php echo $email; ?>" name="email-reg" id="email-reg">
                            <input type="text" required minlength="6" class="field-reg" placeholder="Ваш пароль"
                                   value="<?php echo $password; ?>" name="pas-reg" id="pas-reg">
                            <input type="tel" required minlength="6" class="field-reg" placeholder="Ваш номер телефона"
                                   value="<?php echo $phone; ?>" name="phone" id="phone">
                            <button type="submit" class="btn-success" name="changeProfile">Изменить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#changeProfile").submit(function () {
        $.ajax({
            type: "POST",
            url: "changeProfileAjax.php", //Change
            data: $("#changeProfile").serialize(),
            success: function success(data) {
                console.log('success!');
                document.location.href = '/lk.php';
            }
        });
        return false;
    });
</script>
</body>
</html>