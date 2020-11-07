<?php

// define('EARTH_RADIUS', 6372795);

$shops = [
    ["address" => "Moscow", "latitude" => 55, "longitude" => 37],
    ["address" => "Oceania", "latitude" => 37, "longitude" => 55],
    ["address" => "Vladivostok", "latitude" => 43, "longitude" => 132],
    ["address" => "Samara", "latitude" => 53, "longitude" => 50],
    ["address" => "Ufa", "latitude" => 55, "longitude" => 56],
    ["address" => "New York", "latitude" => 40, "longitude" => 74],
    ["address" => "London", "latitude" => 51, "longitude" => 0],
];

$latitude = $_REQUEST["latitude"];
$longitude = $_REQUEST["longitude"];

$nearest_shop = null;
$min_dist = -1;

foreach ($shops as $shop) {
	// $curr_dist = sqrt(pow(($shop['latitude'] - $latitude), 2) + cos($latitude)*pow(($shop['longitude'] - $longitude), 2));
  $dlat2 = pow(($shop['latitude'] - $latitude), 2);
  $dlon2 = pow(($shop['longitude'] - $longitude), 2;
  $mult = pow((cos(3.14*$shop['longitude']/180)),2);
  $curr_dist = 111.2*sqrt(dlon2 + dlat2*mult)

	if ($min_dist == -1) {
		$nearest_shop = $shop['address'];
		$min_dist = $curr_dist;
	}	
  
	if($curr_dist < $min_dist) {
	  $nearest_shop = $shop['address'];
	  $min_dist = $curr_dist;
	}
}

echo($nearest_shop);