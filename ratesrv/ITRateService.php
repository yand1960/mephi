<?php
function getDollarRate() {
    $rates = file_get_contents('http://www.cbr-xml-daily.ru/daily_json.js');
    $json_rates = json_decode($rates);
    $dollar_rate = $json_rates->Valute->USD->Value;
    return $dollar_rate;
}

$dollar_rate = getDollarRate();
$date = date("d.m.Y H: i s");

//echo "Обменный курс USD по ЦБ РФ на сегодня ({$date}): {$dollar_rate} RUB\n";
echo $dollar_rate." ".$date;
