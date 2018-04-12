<?php
require_once 'db.php';
mysqli_set_charset($link, 'utf8');
function api_query($api_name, array $req = array())
{
    $mt = explode(' ', microtime());
    $NONCE = $mt[1] . substr($mt[0], 2, 6);

    // API settings
    $key = "K-f81ef5276bddda254f459ab526e7ebe675d8aec0"; //TODO replace with your api key from profile page
    $secret = "S-2b5d33f71ca986651d019c4853d844c78f835ef8"; //TODO replace with your api secret from profile page

    $url = "http://api.exmo.com/v1/$api_name";

    $req['nonce'] = $NONCE;

    // generate the POST data string
    $post_data = http_build_query($req, '', '&');

    $sign = hash_hmac('sha512', $post_data, $secret);

    // generate the extra headers
    $headers = array(
        'Sign: ' . $sign,
        'Key: ' . $key,
    );

    // our curl handle (initialize if required)
    static $ch = null;
    if (is_null($ch)) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; PHP client; ' . php_uname('s') . '; PHP/' . phpversion() . ')');
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    // run the query
    $res = curl_exec($ch);
    if ($res === false) throw new Exception('Could not get reply: ' . curl_error($ch));

    $dec = json_decode($res, true);
    if ($dec === null)
        throw new Exception('Invalid data received, please make sure connection is working and requested API exists');

    return $dec;
}

$btcToRUB = api_query('order_book', array('pair'=>'BTC_RUB', 'limit'=>1));
foreach ($btcToRUB as $BTC_RUB => $priceRUB) {
    echo $BTC_RUB . " " . $priceRUB["ask_top"];
    $priceRUB = $priceRUB["ask_top"];
}
echo "<br>";
$btcToUSD = api_query('order_book', array('pair'=>'BTC_USD', 'limit'=>1));
foreach ($btcToUSD as $BTC_USD => $priceUSD) {
    echo $BTC_USD . " " . $priceUSD["ask_top"];
    $priceUSD = $priceUSD["ask_top"];
}

$sql = mysqli_query($link, "INSERT INTO `exmo` (`BTC_USD`, `BTC_RUB`) VALUES ('$priceUSD', '$priceRUB')");