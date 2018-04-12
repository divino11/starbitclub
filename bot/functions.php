<?php
function db_level_2()
{
    require_once '../db.php';
    mysqli_set_charset($link, 'utf8');
    $query = 'SELECT * FROM `auth` WHERE level = "2"';
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($result);
    $level = $user['level'];
    $time = $user['time'];
}
?>