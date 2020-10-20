<?php
function get_currencies() {
    $xml = simplexml_load_file('http://cbr.ru/scripts/XML_daily.asp');
    $currencies = array();
    foreach ($xml->xpath('//Valute') as $valute) {
        $currencies[(string)$valute->CharCode] = (float)str_replace(',', '.', $valute->Value);  
    }
    return $currencies;
}

// Курс доллара
$dollar = get_currencies();
$course = $dollar['USD'];

//Время и Курс в формате JSON 
$date = date("H:i:s");
header('Content-Type: application/json');

echo "{\"Время\": \"$date\" 
 \"Курс $\": \"$course\"}";
