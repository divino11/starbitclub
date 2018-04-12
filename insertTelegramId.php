<?php
require_once 'db.php';
mysqli_set_charset($link, 'utf8');

$id = $_POST["my_id"];
$telegramId = $_POST["telegram_id"];

$sql = "UPDATE `auth` SET id_chat_db = $telegramId WHERE id = $id";
$query = mysqli_query($link, $sql);