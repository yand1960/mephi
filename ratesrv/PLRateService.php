<?php
function get_currencies() {
    $xml = simplexml_load_file('http://cbr.ru/scripts/XML_daily.asp');
    $currencies = array();
    foreach ($xml->xpath('//Valute') as $valute) {
        $currencies[(string)$valute->CharCode] = (float)str_replace(',', '.', $valute->Value);  
    }
    return $currencies;
}

// Курс валют
$course = get_currencies();
$rateD = $course['USD'];
$rateE = $course['EUR'];

//Время и Курс валют в формате JSON 
$time = date("H:i:s");
header('Content-Type: application/json');

echo "{\"Время\": \"$time\" 
 \"Курс USD\": \"$rateD\" , \"Курс EUR\": \"$rateE\"}";
