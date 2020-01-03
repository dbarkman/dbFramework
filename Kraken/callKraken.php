<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 8/24/18
 * Time: 11:13 PM
 */

require_once dirname(__FILE__) . '/../config/credentials.php';

$apiKey = $krakenCreds['apiKey'];
$privateKey = $krakenCreds['privateKey'];

require_once 'KrakenAPI.php';
$kraken = new KrakenAPI($apiKey, $privateKey);

$requestParameters = array();
$response = '';

if (count($argv) <= 1) {
    echo 'Include a method: Time, AssetPairs, Ticker, OHLC, Balance, OpenOrders, OpenPositions, CurrPrice' . "\n";
} else {
    switch ($argv[1]) {
        case 'Time':
            $response = $kraken->QueryPublic('Time');
            break;
        case 'AssetPairs':
            $requestParameters['info'] = 'info';
            $response = $kraken->QueryPublic('AssetPairs', $requestParameters);
            break;
        case 'Ticker':
            $pair = 'XXBTZUSD';
            if (isset($argv[2])) $pair = $argv[2];
            $requestParameters['pair'] = $pair;
            $response = $kraken->QueryPublic('Ticker', $requestParameters);
            break;
        case 'OHLC':
            $pair = 'XXBTZUSD';
            $interval = 1;
            $since = time() - 60;
            if (isset($argv[2])) $pair = $argv[2];
            if (isset($argv[3])) $interval = $argv[3];
            if (isset($argv[4])) $since = $argv[4];
            $requestParameters['pair'] = $pair;
            $requestParameters['interval'] = $interval;
            $requestParameters['since'] = $since;
            $response = $kraken->QueryPublic('OHLC', $requestParameters);
            break;
        case 'Balance':
            $response = $kraken->QueryPrivate('Balance');
            break;
        case 'OpenOrders':
            $requestParameters['trades'] = 'true';
            $response = $kraken->QueryPrivate('OpenOrders', $requestParameters);
            break;
        case 'OpenPositions':
            $requestParameters['docalcs'] = 'true';
            $response = $kraken->QueryPrivate('OpenPositions', $requestParameters);
            break;
        case 'CurrPrice':
            $requestParameters = getOHLC('XXBTZUSD');
            $response = $kraken->QueryPublic('OHLC', $requestParameters);
            //do something with response
            break;
    }
}

switch ($argv[1]) {
    case 'CurrPrice':
        $price = $response['result']['XXBTZUSD'][0][4];
        echo $price . "\n";
        break;
    default:
        print_r($response);
        break;
}


function getOHLC($pair) {
    $pair = $pair;
    $interval = 1;
    $since = time() - 60;
    if (isset($argv[2])) $pair = $argv[2];
    if (isset($argv[3])) $interval = $argv[3];
    if (isset($argv[4])) $since = $argv[4];
    $requestParameters['pair'] = $pair;
    $requestParameters['interval'] = $interval;
    $requestParameters['since'] = $since;
    return $requestParameters;
}