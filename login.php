<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
require_once "db.php";
mysqli_set_charset($link, "utf8");
$email = $_POST['email'];
$pass = $_POST['pass'];
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
    echo '<script>window.location.replace("/lk");</script>';
} else {
    echo '<script>window.location.replace("/index");</script>';
}
?>
