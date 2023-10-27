<?php
namespace App;

use GuzzleHttp\Client;

class CryptoInfo
{
    private Client $client;
    private const API_URL = 'https://api4.binance.com/api/v3/ticker/24hr?symbol=';

    public function __construct()
    {
        $certificatePath = 'C:\Users\turis\PhpstormProjects/cacert.pem';

        $this->client = new Client([
            'verify' => $certificatePath,
        ]);
    }

    public function get24HourInfo(CurrencyPair $pair)
    {
        $url = self::API_URL . $pair->getSymbol();

        $response = $this->client->get($url);
        $data = json_decode((string)$response->getBody(), true);

        return $data;
    }
}