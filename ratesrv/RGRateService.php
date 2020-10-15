<?php
function get_currencies() {
    $xml = simplexml_load_file('http://cbr.ru/scripts/XML_daily.asp');
    $currencies = array();
    foreach ($xml->xpath('//Valute') as $valute) {
        $currencies[(string)$valute->CharCode] = (float)str_replace(',', '.', $valute->Value);  
    }
    return $currencies;
}

// Получаем курс
$dollar = get_currencies();
echo $dollar['USD'];  

				