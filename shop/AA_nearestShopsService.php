<?php

//Допишите сюда еще данных:
$shops = [
	[ "address" => "Moscow", "latitude" => 55, "longitude" => 37],
	[ "address" => "Oceania", "latitude" => 37, "longitude" => 55],
	[ "address" => "Balakovo", "latitude" => 52, "longitude" => 47],
	[ "address" => "Saratov", "latitude" => 51, "longitude" => 46],
	[ "address" => "Ussuriysk", "latitude" => 43, "longitude" => 131],
	[ "address" => "Volgograd", "latitude" => 48, "longitude" => 44],
	[ "address" => "Ufa", "latitude" => 54, "longitude" => 55],
	[ "address" => "New-York", "latitude" => 40, "longitude" => 74],
	[ "address" => "Saint-Petersburg", "latitude" => 59, "longitude" => 30],
	[ "address" => "Omsk", "latitude" => 54, "longitude" => 73]
];

$latitude = $_GET["latitude"];
$longitude = $_GET["longitude"];

$name = "";
$l = 0;
foreach($shops as $shop){
	$d = sqrt((pow($shop["latitude"]-$latitude,2))+(pow($shop["longitude"]-$longitude,2)));
	if ($l == 0) {
		$l = $d;
	}
	else {
		if ($d < $l) {
			$l = $d;
			$name = $shop["address"];
		}
	}
}
echo $name;
