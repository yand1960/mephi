<?php
function getDollarRate() {
    $rates = file_get_contents('http://www.cbr-xml-daily.ru/daily_json.js');
    $json_rates = json_decode($rates);
    $dollar_rate = $json_rates->Valute->USD->Value;
    return $dollar_rate;
}

$dollar_rate = getDollarRate();
$time = time();
$time += 3 * 3600;
$date = date("j.n.Y H:i:s", $time);

//echo "Обменный курс USD по ЦБ РФ на сегодня ({$date}): {$dollar_rate} RUB\n";
$js_data = array('time' => $date. " UTC+3" , 'rate' => $dollar_rate);
header('Content-Type: application/json');
echo json_encode($js_data);
