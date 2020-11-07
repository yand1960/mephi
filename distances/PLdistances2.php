<?php


function get_coordinates() {
	$shops = [
	[ "address" => "Moscow", "latitude" => 55, "longitude" => 37],
	[ "address" => "Oceania", "latitude" => 37, "longitude" => 55],
	[ "address" => "Moscow YAO", "latitude" => 55.623, "longitude" => 37.683],
	[ "address" => "Moscow SAO", "latitude" => 55.842, "longitude" => 37.523],
	[ "address" => "Moscow ZAO", "latitude" => 55.731, "longitude" => 37.445],
	[ "address" => "Moscow WAO", "latitude" => 55.787, "longitude" => 37.775],
	[ "address" => "Kirov", "latitude" => 54.076, "longitude" => 34.305],
	[ "address" => "Saint Petersburg", "latitude" => 59.939, "longitude" => 30.315],
	[ "address" => "Ozersk", "latitude" => 55.763, "longitude" => 60.707]
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



if ($_GET["d"] == 1){
	$latitude = $_GET["latitude"];
    $longitude = $_GET["longitude"];
	echo json_encode (get_distances($latitude,$longitude));
}
else {
	echo json_encode (get_coordinates());
}
