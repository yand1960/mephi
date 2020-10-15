<?php
$ch = curl_init('https://www.cbr-xml-daily.ru/daily_json.js');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$json = curl_exec($ch);
curl_close($ch);

$result = json_decode($json, true);

echo json_encode([ 'result' => $result['Valute']['USD']['Value'] ]);
