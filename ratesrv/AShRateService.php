<?php
    function getRates($ticker) {
        $Rates = file_get_contents("http://www.cbr-xml-daily.ru/daily_json.js");
        $jsonRates = json_decode($Rates);
        $convertRate = $jsonRates->Valute->$ticker->Value;
        return $convertRate;
    }
    $ticker = USD;
    $dollar_rate = getRates($ticker);
    // $now = date("H:i:s");
    date_default_timezone_set("UTC"); // Устанавливаем часовой пояс по Гринвичу
    $time = time(); // Вот это значение отправляем в базу
    $offset = 3; // Допустим, у пользователя смещение относительно Гринвича составляет +3 часа
    $time += 3 * 3600; // Добавляем 3 часа к времени по Гринвичу
    // date("Y-m-d H:i:s", $time);
    $js_data = array('time' => date("Y-m-d H:i:s", $time). " UTC+3" , 'rate' => $dollar_rate);
    header('Content-Type: application/json');
    echo json_encode($js_data);
?>
