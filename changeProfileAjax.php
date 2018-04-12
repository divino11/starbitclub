<?php
require_once "db.php";
mysqli_set_charset($link, 'utf8');

$my_id = $_POST['id'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$phone = $_POST['phone'];
$email = $_POST['email-reg'];
$password = $_POST['pas-reg'];

mysqli_query($link, "UPDATE `auth` SET lastname = '$lastname', firstname = '$firstname', phone = '$phone', email = '$email', password = '$password' WHERE id = '$my_id'");