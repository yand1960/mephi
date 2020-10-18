<?php

    $xml = simplexml_load_file('http://www.cbr-xml-daily.ru/daily.xml');
    $dollar_rate = array();
    foreach ($xml->xpath('//Valute') as $valute) {
        $dollar_rate[(string)$valute->CharCode] = (float)str_replace(',', '.', $valute->Value);  
    }

	$rate = $dollar_rate['USD'];

	$return_value = array();
	$return_value["time"] = date('Y-m-d H:i:s');
	$return_value["rate"] = $rate;
	header('Content-Type: application/json');
	echo json_encode($return_value);