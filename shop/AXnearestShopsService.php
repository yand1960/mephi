<?php
function latlng2distance($lat1, $long1, $lat2, $long2)  {
    //радиус Земли
    $R = 6372795;
    //перевод коордитат в радианы
    $lat1 *= pi() / 180;
    $lat2 *= pi() / 180;
    $long1 *= pi() / 180;
    $long2 *= pi() / 180;
    //вычисление косинусов и синусов широт и разницы долгот
    $cl1 = cos($lat1);
    $cl2 = cos($lat2);
    $sl1 = sin($lat1);
    $sl2 = sin($lat2);
    $delta = $long2 - $long1;
    $cdelta = cos($delta);
    $sdelta = sin($delta);
    //вычисления длины большого круга
    $y = sqrt(pow($cl2 * $sdelta, 2) + pow($cl1 * $sl2 - $sl1 * $cl2 * $cdelta, 2));
    $x = $sl1 * $sl2 + $cl1 * $cl2 * $cdelta;
    $ad = atan2($y, $x);
    $dist = $ad * $R;
    //расстояние между двумя координатами в метрах
    return $dist;
}

$shops  = [
    ["address" => "Moscow. TK Moskvorechie", "latitude" => 55.65346388813023, "longitude" => 37.64701366424561],
    ["address" => "Moscow. TK Gagarinskii", "latitude" => 55.65346388813023, "longitude" => 37.57045269012452],
    ["address" => "Moscow. TK Oxotnii ryad", "latitude" => 55.75671568034274, "longitude" => 37.61686563491822]
];

$latitude = $_REQUEST["latitude"];
$longitude = $_REQUEST["longitude"];

$nearest_shop = null;
// echo($shops[0]['address']);
$min_dist = latlng2distance($latitude, $longitude, $shops[0]['latitude'], $shops[0]['longitude']);

foreach ($shops as $i) {
    $dist = latlng2distance($latitude, $longitude, $i['latitude'], $i['longitude'],);
    // echo($i['address']).";";
    // echo ($dist)."<br />";
    if($dist <= $min_dist){
        $nearest_shop = $i['address'];
        $min_dist = $dist;
    }
}

echo($nearest_shop);