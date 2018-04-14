<?php
$title = $_POST['title'];
$name = $_POST['consultName'];
$phone = $_POST['consultPhone'];


define('CRM_HOST', 'starbitclub1.bitrix24.ru'); // Ваш домен CRM системы
define('CRM_PORT', '443'); // Порт сервера CRM. Установлен по умолчанию
define('CRM_PATH', '/crm/configs/import/lead.php'); // Путь к компоненту lead.rest
define('CRM_LOGIN', 'abollex@mail.ru'); // Логин пользователя Вашей CRM по управлению лидами
define('CRM_PASSWORD', 'AN9Adsa5Oc'); // Пароль пользователя Вашей CRM по управлению лидами

$postData = array(
    'TITLE' => $title,
    'NAME' => $name,
    'PHONE_WORK' => $phone
);
if (defined('CRM_AUTH'))
{
    $postData['AUTH'] = CRM_AUTH;
}
else
{
    $postData['LOGIN'] = CRM_LOGIN;
    $postData['PASSWORD'] = CRM_PASSWORD;
}
$fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
if ($fp)
{
    $strPostData = '';
    foreach ($postData as $key => $value)
        $strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);
    $str = "POST ".CRM_PATH." HTTP/1.0\r\n";
    $str .= "Host: ".CRM_HOST."\r\n";
    $str .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $str .= "Content-Length: ".strlen($strPostData)."\r\n";
    $str .= "Connection: close\r\n\r\n";
    $str .= $strPostData;
    fwrite($fp, $str);
    $result = '';
    while (!feof($fp))
    {
        $result .= fgets($fp, 128);
    }
    fclose($fp);
    $response = explode("\r\n\r\n", $result);
    $output = '<pre>'.print_r($response[1], 1).'</pre>';
}
else
{
    echo 'Connection Failed! '.$errstr.' ('.$errno.')';
}

$to  = "a.vasyukov97@gmail.com" ;

$subject = "StarBitClub Форма бесплатной консультации";

$message = ' 
<html> 
    <head> 
        <title>StarBitClub Форма бесплатной консультации</title> 
    </head> 
    <body> 
        <p>Имя: ' . $name . '</p> 
        <p>Телефон: ' . $phone . '</p> 
    </body> 
</html>';

$headers  = "Content-type: text/html; charset=utf-8 \r\n";
$headers .= "From: StarBitClub <support@starbitclub.com>\r\n";
$headers .= "Bcc: support@starbitclub.com\r\n";

mail($to, $subject, $message, $headers);

?>