<?php

//Допишите сюда еще данных:
$shops = [
	[ "address" => "Moscow, ул. Москворечье 22", "name" => "Берёзка", "latitude" => 55, "longitude" => 37],
	[ "address" => "Oceania, ул. Песчанного дна 1", "name" => "Магазин у океана", "latitude" => 37, "longitude" => 55]
];

$lat1 = $_REQUEST["latitude"];
$lon1 = $_REQUEST["longitude"];

$res = null;
$min = 9999999999;

foreach ($shops as $shop)
{
    $lat2 = $shop['latitude'];
    $lon2 = $shop['longitude'];
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $km = $dist * 6371;  // R(Земли) = 6371
    if ($km < $min) {
        $min = $temp;
        $res = $shop;
    }
}

echo json_encode($res);
