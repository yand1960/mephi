<h1>your dollar value</h1>
<?php


$ch = curl_init("https://www.cbr-xml-daily.ru/daily_json.js");

curl_setopt($ch, CURLOPT_URL, "https://www.cbr-xml-daily.ru/daily_json.js");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$json = curl_exec($ch);
curl_close($ch);

$dollvalue = json_decode($json, true);
echo json_encode(["Valute"]["USD"]["Value"]);

?>