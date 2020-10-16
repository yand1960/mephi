<?php
    function getRates($rate) {
        $Rates = file_get_contents("http://api.currencyfreaks.com/latest?apikey=94c578ee776d4b789dd3339c7db2abd4&base={$rate}");
        $jsonRates = json_decode($Rates);
        $convertRate = $jsonRates->rates->RUB;
        return $convertRate;
    }
    $rate = "EUR";
    $dollar_rate = getRates($rate);
    $now = date("H:i:s")
?>

<h2>Курс доллара на <?=$now?> составляет <?=$dollar_rate?></h2>
