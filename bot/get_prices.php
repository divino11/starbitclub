<?php
require_once 'db.php';
mysqli_set_charset($link, 'utf8');
require 'php-binance-api.php';

// @see home_directory_config.php
// use config from ~/.confg/jaggedsoft/php-binance-api.json
$api = new Binance\API("EgJxhQ8ReF2NCnCVKPYvEavpE4rRWWhnrXIRR7QizZPQi8iJV0wnKFz3Do3s63aI","5J5sn9qGxYj7QzygP1CnYaYEEptoKOAuvHP0178xkR4InHkTFu6elrOFPAudlO3u");

// Get latest price of a symbol
$ticker = $api->prices();
//print_r($ticker); // List prices of all symbols
echo $priceUSD = $ticker['BTCUSDT'];

$sql = mysqli_query($link, "INSERT INTO `binance` (`BTC_USD`) VALUES ('$priceUSD')");



