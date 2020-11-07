<?php


function get_coordinates() {
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
	return $shops;
}
function get_distances($x1, $y1){
	$shops = get_coordinates();
	$distances = array();
	foreach($shops as $shop){
	$d = sqrt((pow($shop["latitude"]-$x1,2))+(pow($shop["longitude"]-$y1,2)));
	array_push($distances,["address" => $shop["address"],"distance" => $d]);
}
	return $distances;
}

$latitude = $_GET["latitude"];
$longitude = $_GET["longitude"];

if ($_GET["d"] == 1){
	echo get_distances($latitude,$longitude);
}
else {
	echo get_coordinates();
}
