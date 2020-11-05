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
foreach ($shops as $key => $value) {
	$cur_dist = pow( ($latitude - $value['latitude']),2) + pow( ($longitude - $value['longitude']),2);
	if ($flag){
		$adress = $value['address'];
		$min_dist = $cur_dist;
		$flag = false;
	}	
  
	if($cur_dist < $min_dist) {
	  $adress = $value['address'];
	  $min_dist = $cur_dist;
	}
  }

  echo($adress);
