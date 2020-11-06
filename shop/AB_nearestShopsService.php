<?php
function get_lenght($x1,$x2,$y1,$y2){
	$l = sqrt((pow($x2-$x1,2))+(pow($y1-$y2,2)));
	return $l;
}	

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

$latitude = $_GET["latitude"];
$longitude = $_GET["longitude"];

$name = "";
$lenght = 0;
foreach($shops as $shop){
	$d = get_lenght($latitude,$shop["latitude"],$longitude,$shop["longitude"]);
	if ($lenght == 0) {
		$lenght = $d;
	}
	else {
		if ($d < $lenght) {
			$lenght = $d;
			$name = $shop["address"];
		}
	}
}
echo $name;
  