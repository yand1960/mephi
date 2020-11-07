<?php

//Допишите сюда еще данных:
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

$latitude = $_REQUEST["latitude"];
$longitude = $_REQUEST["longitude"];

$adress = null;
$flag = true;
$minimal_dist = 0.0;
foreach ($shops as $key => $value) {
	$current_dist = pow( ($latitude - $value['latitude']),2) + pow( ($longitude - $value['longitude']),2);
	if ($flag){
		$adress = $value['address'];
		$minimal_dist = $current_dist;
		$flag = false;
	}	
  
	if($current_dist < $minimal_dist) {
	  $adress = $value['address'];
	  $minimal_dist = $current_dist;
	}
  }

  echo($adress);
