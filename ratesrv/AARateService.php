<?php
$ch = curl_init('http://www.cbr-xml-daily.ru/daily_json.js');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$json = curl_exec($ch);
curl_close($ch);

$result = json_decode($json, true);

header('Content-Type: application/json');
echo json_encode(['time' => time(), 'result' => $result['Valute']['USD']['Value'] ]);