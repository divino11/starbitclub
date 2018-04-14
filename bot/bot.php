<?php
require_once "../db.php";
include('vendor/autoload.php'); //Подключаем библиотеку
use Telegram\Bot\Api;
use Telegram\Bot\Keyboard\Keyboard;

$telegram = new Api('478008139:AAExM24No151geUx1B_gtjHKxmxd8myy0p4', true); //Устанавливаем токен, полученный у BotFather
$result = $telegram->getWebhookUpdates(); //Передаем в переменную $result полную информацию о сообщении пользователя

$text = $result["message"]["text"]; //Текст сообщения
$chat_id = $result["message"]["chat"]["id"]; //Уникальный идентификатор пользователя
$name = $result["message"]["from"]["username"]; //Юзернейм пользователя


$query = "SELECT * FROM `auth` WHERE id_chat_db = '$chat_id'";
$result = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($result);
$level = $user['level'];
$time = $user['time'];
$id = $user['id'];
if ($level == 3) {
    $keyboard_level3 = [
        ["Связь с куратором", "Долгосрочные сигналы"],
        ["Капитализация", "Курс"],
        ["Формирование инвест.портфеля", "Перспективные ICO"],
        ["Пройти обучение", "Мы в соц.сетях"],
        ["Тех. поддержка", "Условия использования"],
        ["Закрытый телеграмм канал", "Открытый телеграмм канал"],
        ["Конкурс"]
        ];
    $keyboard_kurator = [];
    $keyboard_social = [["Instagram", "Youtube"], ["Vkontakte", "Назад"]];
    /*
     *
     * Экран для VIP пользователей
     *
     * */
    if ($text) {
        if ($text == "/start") {
            $reply = "🏆Поздравляем!\n
👥Вы стали полноправным членом клуба StarBitClub!
📍Ваша подписка активирована до 25 декабря 2017 г. 
❗В период с 30.01.2018  по 30.03.2018  мы проводим  конкурс на 1 BTC, для  регистрации в конкурсе перейдите
в раздел \"Конкурс\"
Подробная  информация тут 👉🏼: http://starbitclub.com❗
ℹТеперь вам доступна информация по краткосрочным и долгосрочным сделкам в режиме реального времени. 
Использовать другие возможности помощника вы можете ,воспользовавшись \"Меню\"\ 👇🏼";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level3, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Связь с куратором") {
            $reply = "👤Ваш куратор - Денис
📍При возникновении вопросов  вы всегда можете связаться со своим личным куратором
Контакты для связи:👇🏼 
Telegram: 
Email:   
Skype:  
ℹРежим работы : с 08:00 - 19:00 по МСК.";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level3, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Капитализация") {
            $json = file_get_contents('https://api.coinmarketcap.com/v1/global/');
            $data = json_decode($json);

            $total_market = $data->total_market_cap_usd;
            $total_market = chunk_split($total_market, 3, ' ');
            $bitcoin_percentage = $data->bitcoin_percentage_of_market_cap;
            $active_currencies = $data->active_currencies;
            $reply = "🛡Общая: " . $total_market . " USD
🔝Bitcoin занимает: " . $bitcoin_percentage . "%
🌐Активных криптовалют: " . $active_currencies . "";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level3, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Формирование инвест.портфеля") {
            $reply .= "ℹДля формирования  инвестиционного портфеля свяжитесь со своим куратором!";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level3, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Мы в соц.сетях") {
            $reply .= "\xF0\x9F\x91\xA5Выберите социальную сеть";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Instagram") {
            $reply .= "https://www.instagram.com/bitcoin_stars/";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Youtube") {
            $reply .= "https://www.youtube.com/channel/UCPx7Yj8ra7FKTwEmG5SNiRw?view_as=subscriber";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Vkontakte") {
            $reply .= "https://vk.com/bitcoinstars";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Условия использования") {
            $reply .= "\xE2\x9B\x94 Вся информация, предоставляемаяBitStarBot, является частной собственностью и защищена законом «О защите информации». Распространение и размещение информации на сторонних ресурсах строго запрещено! При несоблюдении данного правила личный кабинет нарушителя блокируется без права на восстановление.";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level3, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Тех. поддержка") {
            $reply .= "\xE2\x84\xB9 Ответы на часто задаваемые вопросы: \n
\x31\xE2\x83\xA3 Аналитика \n
1.1 Техническая поддержка не консультирует в аналитических вопросах.\n
\n1.3 Предоставленная ботом аналитическая информация является субъективной точкой зрения авторов, и может не соответствовать последующей динамике курса криптовалюты по отношению к Bitcoin. \n
1.4 Всем пользователям приходят  одинаковая информация, касающаяся сигналов, капитализации и курсов. \n
1.5 Промежутки между сигналами варьируются в зависимости от ситуации на рынке. Регулярность предоставления сигналов для краткосрочной торговли не регламентируется. \n 
1.6 Регулярность долгосрочных сигналов так же не регламентируется (такие сигналы берутся от 7 дней и определяют общую динамику на биржевом рынке). \n

\x32\xE2\x83\xA3 Связь с тех поддержкой \n

2.1  Связь с тех. поддержкой: \n
2.2 Время ответа тех.поддержки зависит от загруженности , в среднем занимает 1-3 дня.
";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level3, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Курс") {
            $json = file_get_contents('https://api.coinmarketcap.com/v1/ticker/?limit=10');
            $data = json_decode($json);
            $price0 = $data[0]->price_usd;
            $name0 = $data[0]->symbol;
            $price1 = $data[1]->price_usd;
            $name1 = $data[1]->symbol;
            $price2 = $data[2]->price_usd;
            $name2 = $data[2]->symbol;
            $price3 = $data[3]->price_usd;
            $name3 = $data[3]->symbol;
            $price4 = $data[4]->price_usd;
            $name4 = $data[4]->symbol;
            $price5 = $data[5]->price_usd;
            $name5 = $data[5]->symbol;
            $price6 = $data[6]->price_usd;
            $name6 = $data[6]->symbol;
            $price7 = $data[7]->price_usd;
            $name7 = $data[7]->symbol;
            $price8 = $data[8]->price_usd;
            $name8 = $data[8]->symbol;
            $price9 = $data[9]->price_usd;
            $name9 = $data[9]->symbol;
            $reply .= "Топ-10 валют по информации сервиса coinmarketcap.com
" . $name0 . " = " . $price0 . "  USD
" . $name1 . " = " . $price1 . "  USD
" . $name2 . " = " . $price2 . "  USD
" . $name3 . " = " . $price3 . "  USD
" . $name4 . " = " . $price4 . "  USD
" . $name5 . " = " . $price5 . "  USD
" . $name6 . " = " . $price6 . "  USD
" . $name7 . " = " . $price7 . "  USD
" . $name8 . " = " . $price8 . "  USD
" . $name9 . " = " . $price9 . "  USD";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level3, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        }elseif ($text == "Конкурс") {
            $reply .= "❗️Для участия в конкурсе вам необходимо сделать репост Конкурса в группе ВКонтакте
ℹ️Подробная информация тут👉🏼: starbitclub.com
Ссылку на репост необходимо указать в сообщении 👇🏼";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level3, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        }elseif (filter_var($text, FILTER_VALIDATE_URL)) {
            require_once "db.php";
            $sql1 = "UPDATE `auth` SET vk = '$text' WHERE id = $id";
            $query = mysqli_query($link, $sql1);
            $reply .= "✅Вы зарегистрированы в конкурсе на 1 BTC
❗️Ваш номер : " . rand(1, 1000) . "
ℹ️21.04.2018  В прямом эфире  на нашем Youtube канале,  генератором случайных чисел будут выбраны 3 победителя";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level3, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        }elseif ($text == "Последние статьи") {
            $html = simplexml_load_file('http://netology.ru/blog/rss.xml');
            foreach ($html->channel->item as $item) {
                $reply .= "\xE2\x9E\xA1 " . $item->title . " (<a href='" . $item->link . "'>читать</a>)\n";
            }
            $telegram->sendMessage(['chat_id' => $chat_id, 'parse_mode' => 'HTML', 'disable_web_page_preview' => true, 'text' => $reply]);
        } elseif ($text == "Назад") {
            $reply = "Выберите следующее действие";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level3, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Пройти обучение") {
            $reply = "1⃣ https://www.youtube.com/watch?v=5zcdvsFIPfM&feature=youtu.be \n
2⃣ https://www.youtube.com/watch?v=d2An6lqMxrc&feature=youtu.be \n
3⃣ https://www.youtube.com/watch?v=_Qr68zFRgaE&feature=youtu.be";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level3, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Открытый телеграмм канал") {
            $reply .= "https://t.me/joinchat/AAAAAE6yTOiQs46Tc1yF6w";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level3, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Закрытый телеграмм канал") {
            $reply = "https://t.me/joinchat/AAAAAE6yTOiQs46Tc1yF6w";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level3, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Долгосрочные сигналы") {
            $reply = "https://starbitclub.com/signals";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level3, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } else {
            $reply = "По запросу \"<b>" . $text . "</b>\" ничего не найдено.";
            $telegram->sendMessage(['chat_id' => $chat_id, 'parse_mode' => 'HTML', 'text' => $reply]);
        }
    } else {
        $telegram->sendMessage(['chat_id' => $chat_id, 'text' => "Отправьте текстовое сообщение."]);
    }
    exit();
} elseif ($level == 2) {
    $keyboard_level2 = [
        ["Связь с куратором", "Долгосрочные сигналы"],
        ["Капитализация", "Курс"],
        ["Формирование инвест.портфеля", "Перспективные ICO"],
        ["Пройти обучение", "Мы в соц.сетях"],
        ["Тех. поддержка", "Условия использования"],
        ["Закрытый телеграмм канал", "Открытый телеграмм канал"],
        ["Конкурс"]
    ];
    $keyboard_kurator = [];
    $keyboard_social = [["Instagram", "Youtube"], ["Vkontakte", "Назад"]];
    /*
     *
     * Экран для Premium пользователей
     *
     * */
    if ($text) {
        if ($text == "/start") {
            $reply = "🏆Поздравляем!\n
👥Вы стали полноправным членом клуба StarBitClub!                                                            📍Ваша подписка активирована до 25 декабря 2017 г. 
❗В период с 30.01.2018  по 30.03.2018  мы проводим  конкурс на 1 BTC, для  регистрации в конкурсе перейдите
в раздел \"Конкурс\"
Подробная  информация тут 👉🏼: http://starbitclub.com❗
ℹТеперь вам доступна информация по краткосрочным и долгосрочным сделкам в режиме реального времени. 
Использовать другие возможности помощника вы можете ,воспользовавшись \"Меню\"\ 👇🏼";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level2, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Связь с куратором") {
            $reply = "👤Ваш куратор - Денис
📍При возникновении вопросов  вы всегда можете связаться со своим личным куратором
Контакты для связи:👇🏼 
Telegram: 
Email:   
Skype:  
ℹРежим работы : с 08:00 - 19:00 по МСК.";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level2, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Капитализация") {
            $json = file_get_contents('https://api.coinmarketcap.com/v1/global/');
            $data = json_decode($json);

            $total_market = $data->total_market_cap_usd;
            $total_market = chunk_split($total_market, 3, ' ');
            $bitcoin_percentage = $data->bitcoin_percentage_of_market_cap;
            $active_currencies = $data->active_currencies;
            $reply = "🛡Общая: " . $total_market . " USD
🔝Bitcoin занимает: " . $bitcoin_percentage . "%
🌐Активных криптовалют: " . $active_currencies . "";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level2, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Формирование инвест.портфеля") {
            $reply .= "ℹДля формирования  инвестиционного портфеля свяжитесь со своим куратором!";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level2, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Мы в соц.сетях") {
            $reply .= "\xF0\x9F\x91\xA5Выберите социальную сеть";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Instagram") {
            $reply .= "https://www.instagram.com/bitcoin_stars/";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Youtube") {
            $reply .= "https://www.youtube.com/channel/UCPx7Yj8ra7FKTwEmG5SNiRw?view_as=subscriber";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Vkontakte") {
            $reply .= "https://vk.com/bitcoinstars";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Условия использования") {
            $reply .= "\xE2\x9B\x94 Вся информация, предоставляемаяBitStarBot, является частной собственностью и защищена законом «О защите информации». Распространение и размещение информации на сторонних ресурсах строго запрещено! При несоблюдении данного правила личный кабинет нарушителя блокируется без права на восстановление.";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level2, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Тех. поддержка") {
            $reply .= "\xE2\x84\xB9 Ответы на часто задаваемые вопросы: \n
\x31\xE2\x83\xA3 Аналитика \n
1.1 Техническая поддержка не консультирует в аналитических вопросах.\n
\n1.3 Предоставленная ботом аналитическая информация является субъективной точкой зрения авторов, и может не соответствовать последующей динамике курса криптовалюты по отношению к Bitcoin. \n
1.4 Всем пользователям приходят  одинаковая информация, касающаяся сигналов, капитализации и курсов. \n
1.5 Промежутки между сигналами варьируются в зависимости от ситуации на рынке. Регулярность предоставления сигналов для краткосрочной торговли не регламентируется. \n 
1.6 Регулярность долгосрочных сигналов так же не регламентируется (такие сигналы берутся от 7 дней и определяют общую динамику на биржевом рынке). \n

\x32\xE2\x83\xA3 Связь с тех поддержкой \n

2.1  Связь с тех. поддержкой: \n
2.2 Время ответа тех.поддержки зависит от загруженности , в среднем занимает 1-3 дня.
";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level2, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Курс") {
            $json = file_get_contents('https://api.coinmarketcap.com/v1/ticker/?limit=10');
            $data = json_decode($json);

            $price0 = $data[0]->price_usd;
            $name0 = $data[0]->symbol;
            $price1 = $data[1]->price_usd;
            $name1 = $data[1]->symbol;
            $price2 = $data[2]->price_usd;
            $name2 = $data[2]->symbol;
            $price3 = $data[3]->price_usd;
            $name3 = $data[3]->symbol;
            $price4 = $data[4]->price_usd;
            $name4 = $data[4]->symbol;
            $price5 = $data[5]->price_usd;
            $name5 = $data[5]->symbol;
            $price6 = $data[6]->price_usd;
            $name6 = $data[6]->symbol;
            $price7 = $data[7]->price_usd;
            $name7 = $data[7]->symbol;
            $price8 = $data[8]->price_usd;
            $name8 = $data[8]->symbol;
            $price9 = $data[9]->price_usd;
            $name9 = $data[9]->symbol;
            $reply .= "Топ-10 валют по информации сервиса coinmarketcap.com
" . $name0 . " = " . $price0 . "  USD
" . $name1 . " = " . $price1 . "  USD
" . $name2 . " = " . $price2 . "  USD
" . $name3 . " = " . $price3 . "  USD
" . $name4 . " = " . $price4 . "  USD
" . $name5 . " = " . $price5 . "  USD
" . $name6 . " = " . $price6 . "  USD
" . $name7 . " = " . $price7 . "  USD
" . $name8 . " = " . $price8 . "  USD
" . $name9 . " = " . $price9 . "  USD";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level2, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        }elseif ($text == "Конкурс") {
            $reply .= "❗️Для участия в конкурсе вам необходимо сделать репост Конкурса в группе ВКонтакте
ℹ️Подробная информация тут👉🏼: starbitclub.com
Ссылку на репост необходимо указать в сообщении 👇🏼";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level2, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        }elseif (filter_var($text, FILTER_VALIDATE_URL)) {
            require_once "db.php";
            $sql1 = "UPDATE `auth` SET vk = '$text' WHERE id = $id";
            $query = mysqli_query($link, $sql1);
            $reply .= "✅Вы зарегистрированы в конкурсе на 1 BTC
❗️Ваш номер : " . rand(1, 1000) . "
ℹ️21.04.2018  В прямом эфире  на нашем Youtube канале,  генератором случайных чисел будут выбраны 3 победителя";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level2, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        }elseif ($text == "Последние статьи") {
            $html = simplexml_load_file('http://netology.ru/blog/rss.xml');
            foreach ($html->channel->item as $item) {
                $reply .= "\xE2\x9E\xA1 " . $item->title . " (<a href='" . $item->link . "'>читать</a>)\n";
            }
            $telegram->sendMessage(['chat_id' => $chat_id, 'parse_mode' => 'HTML', 'disable_web_page_preview' => true, 'text' => $reply]);
        } elseif ($text == "Назад") {
            $reply = "Выберите следующее действие";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level2, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Открытый телеграмм канал") {
            $reply .= "https://t.me/joinchat/AAAAAE6yTOiQs46Tc1yF6w";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level2, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Закрытый телеграмм канал") {
            $reply = "https://t.me/joinchat/AAAAAE6yTOiQs46Tc1yF6w";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level3, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Пройти обучение") {
            $reply = "1⃣ https://www.youtube.com/watch?v=5zcdvsFIPfM&feature=youtu.be \n
2⃣ https://www.youtube.com/watch?v=d2An6lqMxrc&feature=youtu.be \n
3⃣ https://www.youtube.com/watch?v=_Qr68zFRgaE&feature=youtu.be";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level2, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Долгосрочные сигналы") {
            $reply = "https://starbitclub.com/signals";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level2, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } else {
            $reply = "По запросу \"<b>" . $text . "</b>\" ничего не найдено.";
            $telegram->sendMessage(['chat_id' => $chat_id, 'parse_mode' => 'HTML', 'text' => $reply]);
        }
    } else {
        $telegram->sendMessage(['chat_id' => $chat_id, 'text' => "Отправьте текстовое сообщение."]);
    }
    exit();
} elseif ($level == 1) {
    /*
     *
     * Экран для Standart пользователей
     *
     * */

    $keyboard_level1 = [
        ["Связь с куратором", "Долгосрочные сигналы"],
        ["Капитализация", "Курс"],
        ["Формирование инвест.портфеля", "Подписаться на новости/Отписаться от новостей"],
        ["Пройти обучение", "Мы в соц.сетях"],
        ["Тех. поддержка", "Условия использования"],
        ["Открытый телеграмм канал", "Конкурс"]];
    $keyboard_kurator = [];
    $keyboard_social = [["Instagram", "Youtube"], ["Vkontakte", "Назад"]];
    /*
     *
     * Экран для Premium пользователей
     *
     * */
    if ($text) {
        if ($text == "/start") {
            $reply = "🏆Поздравляем!\n
👥Вы стали полноправным членом клуба StarBitClub!                                                            📍Ваша подписка активирована до 25 декабря 2017 г. 
❗В период с 30.01.2018  по 30.03.2018  мы проводим  конкурс на 1 BTC, для  регистрации в конкурсе перейдите
в раздел \"Конкурс\"
Подробная  информация тут 👉🏼: http://starbitclub.com❗
ℹТеперь вам доступна информация по краткосрочным и долгосрочным сделкам в режиме реального времени. 
Использовать другие возможности помощника вы можете ,воспользовавшись \"Меню\"\ 👇🏼";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level1, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Связь с куратором") {
            $reply = "👤Ваш куратор - Денис
📍При возникновении вопросов  вы всегда можете связаться со своим личным куратором
Контакты для связи:👇🏼 
Telegram: 
Email:   
Skype:  
ℹРежим работы : с 08:00 - 19:00 по МСК.";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level1, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Капитализация") {
            $json = file_get_contents('https://api.coinmarketcap.com/v1/global/');
            $data = json_decode($json);

            $total_market = $data->total_market_cap_usd;
            $total_market = chunk_split($total_market, 3, ' ');
            $bitcoin_percentage = $data->bitcoin_percentage_of_market_cap;
            $active_currencies = $data->active_currencies;
            $reply = "🛡Общая: " . $total_market . " USD
🔝Bitcoin занимает: " . $bitcoin_percentage . "%
🌐Активных криптовалют: " . $active_currencies . "";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level1, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Формирование инвест.портфеля") {
            $reply .= "ℹДля формирования  инвестиционного портфеля свяжитесь со своим куратором!";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level1, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Мы в соц.сетях") {
            $reply .= "\xF0\x9F\x91\xA5Выберите социальную сеть";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Instagram") {
            $reply .= "https://www.instagram.com/bitcoin_stars/";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Youtube") {
            $reply .= "https://www.youtube.com/channel/UCPx7Yj8ra7FKTwEmG5SNiRw?view_as=subscriber";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Vkontakte") {
            $reply .= "https://vk.com/bitcoinstars";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Условия использования") {
            $reply .= "\xE2\x9B\x94 Вся информация, предоставляемаяBitStarBot, является частной собственностью и защищена законом «О защите информации». Распространение и размещение информации на сторонних ресурсах строго запрещено! При несоблюдении данного правила личный кабинет нарушителя блокируется без права на восстановление.";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level1, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Открытый телеграмм канал") {
            $reply .= "https://t.me/joinchat/AAAAAE6yTOiQs46Tc1yF6w";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level1, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Тех. поддержка") {
            $reply .= "\xE2\x84\xB9 Ответы на часто задаваемые вопросы: \n
\x31\xE2\x83\xA3 Аналитика \n
1.1 Техническая поддержка не консультирует в аналитических вопросах.\n
\n1.3 Предоставленная ботом аналитическая информация является субъективной точкой зрения авторов, и может не соответствовать последующей динамике курса криптовалюты по отношению к Bitcoin. \n
1.4 Всем пользователям приходят  одинаковая информация, касающаяся сигналов, капитализации и курсов. \n
1.5 Промежутки между сигналами варьируются в зависимости от ситуации на рынке. Регулярность предоставления сигналов для краткосрочной торговли не регламентируется. \n 
1.6 Регулярность долгосрочных сигналов так же не регламентируется (такие сигналы берутся от 7 дней и определяют общую динамику на биржевом рынке). \n

\x32\xE2\x83\xA3 Связь с тех поддержкой \n

2.1  Связь с тех. поддержкой: \n
2.2 Время ответа тех.поддержки зависит от загруженности , в среднем занимает 1-3 дня.
";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level1, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Курс") {
            $json = file_get_contents('https://api.coinmarketcap.com/v1/ticker/?limit=10');
            $data = json_decode($json);

            $price0 = $data[0]->price_usd;
            $name0 = $data[0]->symbol;
            $price1 = $data[1]->price_usd;
            $name1 = $data[1]->symbol;
            $price2 = $data[2]->price_usd;
            $name2 = $data[2]->symbol;
            $price3 = $data[3]->price_usd;
            $name3 = $data[3]->symbol;
            $price4 = $data[4]->price_usd;
            $name4 = $data[4]->symbol;
            $price5 = $data[5]->price_usd;
            $name5 = $data[5]->symbol;
            $price6 = $data[6]->price_usd;
            $name6 = $data[6]->symbol;
            $price7 = $data[7]->price_usd;
            $name7 = $data[7]->symbol;
            $price8 = $data[8]->price_usd;
            $name8 = $data[8]->symbol;
            $price9 = $data[9]->price_usd;
            $name9 = $data[9]->symbol;
            $reply .= "Топ-10 валют по информации сервиса coinmarketcap.com
" . $name0 . " = " . $price0 . "  USD
" . $name1 . " = " . $price1 . "  USD
" . $name2 . " = " . $price2 . "  USD
" . $name3 . " = " . $price3 . "  USD
" . $name4 . " = " . $price4 . "  USD
" . $name5 . " = " . $price5 . "  USD
" . $name6 . " = " . $price6 . "  USD
" . $name7 . " = " . $price7 . "  USD
" . $name8 . " = " . $price8 . "  USD
" . $name9 . " = " . $price9 . "  USD";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level1, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        }elseif ($text == "Конкурс") {
            $reply .= "❗️Для участия в конкурсе вам необходимо сделать репост Конкурса в группе ВКонтакте
ℹ️Подробная информация тут👉🏼: starbitclub.com
Ссылку на репост необходимо указать в сообщении 👇🏼";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level1, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        }elseif (filter_var($text, FILTER_VALIDATE_URL)) {
            require_once "db.php";
            $sql1 = "UPDATE `auth` SET vk = '$text' WHERE id = $id";
            $query = mysqli_query($link, $sql1);
            $reply .= "✅Вы зарегистрированы в конкурсе на 1 BTC
❗️Ваш номер : " . rand(1, 1000) . "
ℹ️21.04.2018  В прямом эфире  на нашем Youtube канале,  генератором случайных чисел будут выбраны 3 победителя";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level1, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        }elseif ($text == "Последние статьи") {
            $html = simplexml_load_file('http://netology.ru/blog/rss.xml');
            foreach ($html->channel->item as $item) {
                $reply .= "\xE2\x9E\xA1 " . $item->title . " (<a href='" . $item->link . "'>читать</a>)\n";
            }
            $telegram->sendMessage(['chat_id' => $chat_id, 'parse_mode' => 'HTML', 'disable_web_page_preview' => true, 'text' => $reply]);
        } elseif ($text == "Назад") {
            $reply = "Выберите следующее действие";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level1, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Пройти обучение") {
            $reply = "1⃣ https://www.youtube.com/watch?v=5zcdvsFIPfM&feature=youtu.be \n
2⃣ https://www.youtube.com/watch?v=d2An6lqMxrc&feature=youtu.be \n
3⃣ https://www.youtube.com/watch?v=_Qr68zFRgaE&feature=youtu.be";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level1, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Долгосрочные сигналы") {
            $reply = "https://starbitclub.com/signals";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_level1, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } else {
            $reply = "По запросу \"<b>" . $text . "</b>\" ничего не найдено.";
            $telegram->sendMessage(['chat_id' => $chat_id, 'parse_mode' => 'HTML', 'text' => $reply]);
        }
    } else {
        $telegram->sendMessage(['chat_id' => $chat_id, 'text' => "Отправьте текстовое сообщение."]);
    }
    exit();
} else {
    /*
     *
     * Экран для всех пользователей
     *
     * */

    $keyboard = [["\xE2\x9C\x85Начать работу", "\xF0\x9F\x93\xA1Мы в соц. сетях"], ["Посмотреть отзывы", "Тех. поддержка"], ["Условия использования", "Курс BTC"]]; //Клавиатура
    $keyboard_review = [["\xE2\xAC\x85Назад", "\xE2\x9C\x85Начать работу"], ["\xF0\x9F\x93\xA1Мы в соц. сетях", "Тех. поддержка"], ["Условия использования", "Курс BTC"]]; //Клавиатура
    $keyboard_social = [["\xF0\x9F\x93\xB7Instagram", "Youtube"], ["Vkontakte", "\xE2\xAC\x85Назад"]]; //Клавиатура
    $keyboard_use = [["\xE2\xAC\x85Назад", "\xE2\x9C\x85Начать работу"], ["\xF0\x9F\x93\xA1Мы в соц. сетях", "Посмотреть отзывы"], ["Тех. поддержка", "Курс BTC"]]; //Клавиатура
    $keyboard_tech = [["\xE2\xAC\x85Назад", "\xE2\x9C\x85Начать работу"], ["\xF0\x9F\x93\xA1Мы в соц. сетях", "Посмотреть отзывы"], ["Условия использования", "Курс BTC"]]; //Клавиатура
    $keyboard_start = [["\xE2\xAC\x85Назад", "\xF0\x9F\x93\xA1Мы в соц. сетях"], ["Посмотреть отзывы", "Тех. поддержка"], ["Условия использования", "Курс BTC"]]; //Клавиатура
    $keyboard_trade = [["Binance", "Exmo"], ["\xE2\xAC\x85Назад"]]; //Клавиатура
    if ($text) {
        if ($text == "/start") {
            $reply = "\xE2\x9C\x85 Приветствую \n
\xE2\x84\xB9 Меня зовут BTCStarsBot, я создан для сопровождения вас в криптовалютной биржевой торговле. \n
\xF0\x9F\x91\xA4 Я способен: 
\x31\xE2\x83\xA3 Информировать о самых актуальных сигналах на все виды сделок на криптовалютных биржах Exmo и Binance. 
\x32\xE2\x83\xA3 Сообщать об актуальных новостях в мире криптовалют. 
\x33\xE2\x83\xA3 Информировать о курсе BTC на биржах Exmo и Binance. 
\x34\xE2\x83\xA3 Сформировать ваш  инвестиционный  портфель. 
\x35\xE2\x83\xA3 Информировать об актуальных новостях из первоисточников. 
\x36\xE2\x83\xA3 Информировать о появлении  перспективных ICO. 
\x37\xE2\x83\xA3 Информировать  о капитализации  криптовалют в реальном времени. 
\x38\xE2\x83\xA3 Скоординировать вас  с куратором. \n
Может приступим?";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard, 'resize_keyboard' => true, 'one_time_keyboard' => false]);

            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "/help") {
            $reply = "Информация с помощью.";
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply]);
        } elseif ($text == "\xE2\xAC\x85Назад") {
            $reply = "Выберите следующее действие";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Посмотреть отзывы") {
            $reply .= "Отзывы вы можете посмотреть на нашем сайте: \n \xF0\x9F\x91\x89 starbitclub.com ";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_review, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "\xF0\x9F\x93\xA1Мы в соц. сетях") {
            $reply .= "\xF0\x9F\x91\xA5 Выберите социальную сеть";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "\xF0\x9F\x93\xB7Instagram") {
            $reply .= "https://www.instagram.com/bitcoin_stars/";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Youtube") {
            $reply .= "https://www.youtube.com/channel/UCPx7Yj8ra7FKTwEmG5SNiRw?view_as=subscriber";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Vkontakte") {
            $reply .= "https://vk.com/bitcoinstars";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Условия использования") {
            $reply .= "\xE2\x9B\x94 Вся информация, предоставляемаяBitStarBot, является частной собственностью и защищена законом «О защите информации». Распространение и размещение информации на сторонних ресурсах строго запрещено! При несоблюдении данного правила личный кабинет нарушителя блокируется без права на восстановление.";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_use, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Тех. поддержка") {
            $reply .= "\xE2\x84\xB9 Ответы на часто задаваемые вопросы: \n
\x31\xE2\x83\xA3 Аналитика \n
1.1 Техническая поддержка не консультирует в аналитических вопросах.\n
\n1.3 Предоставленная ботом аналитическая информация является субъективной точкой зрения авторов, и может не соответствовать последующей динамике курса криптовалюты по отношению к Bitcoin. \n
1.4 Всем пользователям приходят  одинаковая информация, касающаяся сигналов, капитализации и курсов. \n
1.5 Промежутки между сигналами варьируются в зависимости от ситуации на рынке. Регулярность предоставления сигналов для краткосрочной торговли не регламентируется. \n 
1.6 Регулярность долгосрочных сигналов так же не регламентируется (такие сигналы берутся от 7 дней и определяют общую динамику на биржевом рынке). \n

\x32\xE2\x83\xA3 Связь с тех поддержкой \n

2.1  Связь с тех. поддержкой: \n
2.2 Время ответа тех.поддержки зависит от загруженности , в среднем занимает 1-3 дня.
";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_tech, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "\xE2\x9C\x85Начать работу") {
            $reply .= "\xF0\x9F\x93\x8D Вам необходимо  вступить в клуб и активировать подписку для использования полного функционала помощника. \n\n
\xE2\x84\xB9 Ваш ID: " . $chat_id . "\n\n
\xE2\x84\xB9 ID необходимо указать в личном кабинете при вступлении в клуб, для того чтобы помощник смог вас идентифицировать. \n
С условиями членства ,вы можете ознакомиться на нашем сайте:
\xF0\x9F\x91\x89 starbitclub.com";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_start, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Курс BTC") {
            $reply .= "Выберите биржу";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_trade, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Binance") {
            $query = 'SELECT * FROM `binance` ORDER BY id DESC';
            $result = mysqli_query($link, $query); //ответ базы запишем в переменную $result
            $user = mysqli_fetch_assoc($result); //преобразуем ответ из БД в нормальный массив PHP
            $priceUSD = $user['BTC_USD'];
            $reply .= "1 BTC = " . $priceUSD . "  USD";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Exmo") {
            $query = 'SELECT * FROM `exmo` ORDER BY id DESC';
            $result = mysqli_query($link, $query); //ответ базы запишем в переменную $result
            $user = mysqli_fetch_assoc($result); //преобразуем ответ из БД в нормальный массив PHP
            $priceUSD = $user['BTC_USD'];
            $priceRUB = $user['BTC_RUB'];
            $reply .= "1 BTC = " . $priceUSD . "  USD \n1 BTC = " . $priceRUB . "  RUB";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "") {
            $reply .= "\xF0\x9F\x91\xA5 Выберите социальную сеть";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "\xF0\x9F\x93\xA1Мы в соц. сетях") {
            $reply .= "\xF0\x9F\x91\xA5 Выберите социальную сеть";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "\xF0\x9F\x93\xA1Мы в соц. сетях") {
            $reply .= "\xF0\x9F\x91\xA5 Выберите социальную сеть";
            $reply_markup = $telegram->replyKeyboardMarkup(['keyboard' => $keyboard_social, 'resize_keyboard' => true, 'one_time_keyboard' => false]);
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
        } elseif ($text == "Последние статьи") {
            $html = simplexml_load_file('http://netology.ru/blog/rss.xml');
            foreach ($html->channel->item as $item) {
                $reply .= "\xE2\x9E\xA1 " . $item->title . " (<a href='" . $item->link . "'>читать</a>)\n";
            }
            $telegram->sendMessage(['chat_id' => $chat_id, 'parse_mode' => 'HTML', 'disable_web_page_preview' => true, 'text' => $reply]);
        } else {
            $reply = "По запросу \"<b>" . $text . "</b>\" ничего не найдено.";
            $telegram->sendMessage(['chat_id' => $chat_id, 'parse_mode' => 'HTML', 'text' => $reply]);
        }
    }
}
?>