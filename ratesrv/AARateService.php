<?php

$ch = curl_init('https://www.cbr-xml-daily.ru/daily_json.js');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$json = curl_exec($ch);
$dollar_rate = json_decode($json);


curl_close($ch);


$USD = $dollar_rate["Valute"]["USD"]["Value"];

echo $USD;