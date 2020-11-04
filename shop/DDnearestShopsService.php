<?php

$shops = [
	["address" => "KFC(Тула)", "latitude" => 52, "longitude" => 37],
    ["address" => "Burger king(Варшавское 333)", "latitude" => 37, "longitude" => 55],
    ["address" => "PizzaHut(Каширская 33)", "latitude" => 52, "longitude" => 34],
    ["address" => "Pivo+Raki(пролетарский 3)", "latitude" => 55, "longitude" => 37]
];

$latitude = $_REQUEST["latitude"];
$longitude = $_REQUEST["longitude"];

$adress = null;
$flag = true;
$Radius = 0.0;
foreach ($shops as $key => $value) {
	$Rvector = pow((pow( ($latitude - $value['latitude']),2) + pow( ($longitude - $value['longitude']),2)),0.5);
	if ($flag){
		$adress = $value['address'];
		$Radius = $Rvector;
		$flag = false;
	}	
  
	if($Rvector < $Radius) {
	  $adress = $value['address'];
	  $Radius = $Rvector;
	}
  }

  echo($adress);
