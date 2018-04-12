<?php
require_once "db.php";
mysqli_set_charset($link, 'utf8');
$secret_key = '0lGwh18sHv2DurF16pVv62Xm'; // секрет, который мы получили в первом шаге от яндекс.
// получение данных.
// возможно некоторые из нижеперечисленных параметров вам пригодятся
// $_POST['operation_id'] - номер операция
// $_POST['amount'] - количество денег, которые поступят на счет получателя
// $_POST['withdraw_amount'] - количество денег, которые будут списаны со счета покупателя
// $_POST['datetime'] - тут понятно, дата и время оплаты
// $_POST['sender'] - если оплата производится через Яндекс Деньги, то этот параметр содержит номер кошелька покупателя
// $_POST['label'] - лейбл, который мы указывали в форме оплаты
// $_POST['email'] - email покупателя (доступен только при использовании https://)

$sha1 = sha1( $_POST['notification_type'] . '&'. $_POST['operation_id']. '&' . $_POST['amount'] . '&643&' . $_POST['datetime'] . '&'. $_POST['sender'] . '&' . $_POST['codepro'] . '&' . $secret_key. '&' . $_POST['label'] );

if ($sha1 != $_POST['sha1_hash'] ) {
    // тут содержится код на случай, если верификация не пройдена
    exit();
}
$notification_type = $_POST['notification_type'];
$operation_id = $_POST['operation_id'];
$amount = $_POST['amount'];
$datetime = $_POST['datetime'];
$sender = $_POST['sender'];
$codepro = $_POST['codepro'];
$label = $_POST['label'];
// дальше ваш код для обновления баланса пользователя / для вставки полученного платежа в историю платежей, например:
$sql = mysqli_query($link, "INSERT INTO `payment` (`notification_type`, `operation_id`, `amount`, `datetime`, `sender`, `codepro`, `label`) VALUES ('$notification_type', '$operation_id', '$amount', '$datetime', '$sender', '$codepro', '$label')");
// тут код на случай, если проверка прошла успешно
$price = round($amount * 0.95, 1);
$priceStandart = round(5 * 0.95, 1);
$pricePremium = round(15000 * 0.95, 1);
$priceVip = round(30000 * 0.95, 1);
$test = 4.98;
if ($price == $test) {
    $sql = "UPDATE `auth` SET level = '1' WHERE id = $label";
    $query = mysqli_query($link, $sql);
} elseif ($price == $pricePremium) {
    $sql = "UPDATE `auth` SET level = '2' WHERE id = $label";
    $query = mysqli_query($link, $sql);
} elseif ($price == $pricePremium) {
    $sql = "UPDATE `auth` SET level = '3' WHERE id = $label";
    $query = mysqli_query($link, $sql);
}
exit();


//db_query('INSERT INTO payments (user_id, amount) VALUES('.$r['label'].', ',$r['amount']')'); // ваш запрос в базу
?>