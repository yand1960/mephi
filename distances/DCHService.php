<?php

$shops = [
    ["address" => "Moscow", "latitude" => 55, "longitude" => 37],
    ["address" => "Oceania", "latitude" => 37, "longitude" => 55],
    ["address" => "Moscow, Kashirskoe sh.", "latitude" => 55.6493683, "longitude" => 37.6528267],
    ["address" => "Moscow, 5th Kabelnaya st.", "latitude" => 55.7514712, "longitude" => 37.6977122],
    ["address" => "Moscow, st. Skladochnaya", "latitude" => 55.810094, "longitude" => 37.6193566],
    ["address" => "Moscow, st. Bolshaya Filevskaya", "latitude" => 55.7368464, "longitude" => 37.4747629]
];

header('Content-Type: application/json');
echo json_encode($shops);