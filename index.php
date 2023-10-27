<?php
require_once 'vendor/autoload.php';

use App\Currency;
use App\CurrencyPair;
use App\CryptoInfo;

$cryptoInfo = new CryptoInfo();

echo "Enter cryptocurrency (ETH or LTC): ";
$chooseCrypto = readline();

$validCryptos = ['ETH', 'LTC'];

if (in_array($chooseCrypto, $validCryptos)) {
    $baseCurrency = new Currency($chooseCrypto);
    $quoteCurrency = new Currency('BTC');
    $pair = new CurrencyPair($baseCurrency, $quoteCurrency);
    $result = $cryptoInfo->get24HourInfo($pair);

    echo "Symbol: {$result['symbol']}\n";
    echo "Last Price: {$result['lastPrice']}\n";
    echo "24h High: {$result['highPrice']}\n";
    echo "24h Low: {$result['lowPrice']}\n";
} else {
    echo "Invalid cryptocurrency selection. Please enter 'ETH' or 'LTC'.\n";
}
