<?php


function get_coordinates() {
	$shops = [
  	[ "address" => "Voronezh", "latitude" => 44, "longitude" => 58],
	[ "address" => "Ryazan", "latitude" => 52, "longitude" => 50]
	[ "address" => "Tambov", "latitude" => 48, "longitude" => 50],
	[ "address" => "Kotovsk", "latitude" => 49, "longitude" => 50],
	[ "address" => "Michurinsk", "latitude" => 47, "longitude" => 52],
	[ "address" => "Uvarovo", "latitude" => 48, "longitude" => 52],
	[ "address" => "Zherdevka", "latitude" => 54, "longitude" => 51],
	[ "address" => "Morshansk", "latitude" => 40, "longitude" => 56],
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
