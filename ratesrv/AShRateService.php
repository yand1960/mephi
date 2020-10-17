<?php
    function getRates($ticker) {
        $Rates = file_get_contents("http://www.cbr-xml-daily.ru/daily_json.js");
        $jsonRates = json_decode($Rates);
        $convertRate = $jsonRates->Valute->$ticker->Value;
        return $convertRate;
    }
    $ticker = "USD";
    $dollar_rate = getRates($ticker);
    date_default_timezone_set("UTC");
    $time = time();
    $offset = 3;
    $time += 3 * 3600;
    $js_data = array('time' => date("Y-m-d H:i:s", $time). " UTC+3" , 'rate' => $dollar_rate);
    header('Content-Type: application/json');
    echo json_encode($js_data);
?>
