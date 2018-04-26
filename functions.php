<?php
function whatIsDatePosted($date) {
    $dateFromDB = date('d.m.Y', strtotime($date));
    $dateToday = date('d.m.Y');
    if ($dateFromDB == $dateToday) {
        echo "Сегодня";
    } elseif($dateFromDB == date('d.m.Y', strtotime($dateToday . "- 1 day"))) {
        echo "Вчера";
    } else {
        echo date('d.m.Y', strtotime($dateFromDB));
    }
}

function isRate($level) {
    switch ($level) {
        case '1':
            echo "Standart";
            break;
        case '2':
            echo "Premium";
            break;
        case '3':
            echo "VIP";
            break;
        default:
            echo "-";
    }
}
?>