<?php

use Metaregistrar\Api\Client\Connection;


$hostname = 'api-ote.metaregistrar.com';
$apiKey = 'fillme';
require_once(__DIR__ . "/../vendor/autoload.php");


$connection = new Connection($hostname, $apiKey);
$domain = 'zerg-controlpanel-test-2019-10-09-03.com';
$infoRequest = new \Metaregistrar\Api\Client\Request\DnszoneInfoRequest($domain);

$info = $connection->sendCommand($infoRequest);
$info->setRawBody('');
print_r($info);
