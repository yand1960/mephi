<?php

$shops = [
	["address" => "London", "latitude" => 51.50, "longitude" => -0.125],
    ["address" => "Moscow st.Moskvorechie", "latitude" => 55.6454, "longitude" => 37.6492],
    ["address" => "Moscow kremlin", "latitude" => 55, "longitude" => 37],
    ["address" => "Oceania", "latitude" => 37, "longitude" => 55]
];

$latitude = $_REQUEST["latitude"];
$longitude = $_REQUEST["longitude"];

$adress = null;
$flag = true;
$min_dist = 0.0;
foreach ($shops as $shop) {
	$cur_dist = pow( ($latitude - $shop['latitude']),2) + pow( ($longitude - $shop['longitude']),2);
	if ($flag){
		$adress = $shop['address'];
		$min_dist = $cur_dist;
		$flag = false;
	}	
  
	if($cur_dist < $min_dist) {
	  $adress = $shop['address'];
	  $min_dist = $cur_dist;
	}
  }

  echo($adress);
