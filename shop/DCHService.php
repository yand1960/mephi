<?php

$shops = [
    ["address" => "Moscow", "latitude" => 55, "longitude" => 37],
    ["address" => "Oceania", "latitude" => 37, "longitude" => 55],
    ["address" => "Moscow, Kashirskoe sh., 26, 115522", "latitude" => 55.6493683, "longitude" => 37.6528267],
    ["address" => "Moscow, 5th Kabelnaya st., 2 building 1, 111024", "latitude" => 55.7514712, "longitude" => 37.6977122],
    ["address" => "Moscow, st. Skladochnaya, 1, 127018", "latitude" => 55.810094, "longitude" => 37.6193566],
    ["address" => "Moscow, st. Bolshaya Filevskaya, 35, 121433", "latitude" => 55.7368464, "longitude" => 37.4747629]
];

$latitude = $_REQUEST["latitude"];
$longitude = $_REQUEST["longitude"];

$res = null;
$min = 10;
foreach ($shops as $shop) {
    $dist = pow( ($latitude - $shop['latitude']),2) + pow( ($longitude - $shop['longitude']),2);

    if($dist < $min) {
        $res = $shop;
        $min = $dist;
    }
}

echo json_encode($res);