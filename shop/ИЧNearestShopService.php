<?php

$shops = [
    ["address" => "Moscow", "latitude" => 55, "longitude" => 37],
    ["address" => "Oceania", "latitude" => 37, "longitude" => 55]
];

$latitude = floatval($_GET['latitude']);
$longitude = floatval($_GET['longitude']);

$res = null;
$min = 10;
foreach ($shops as $key => $value) {
  $d = acos(
    sin($latitude) * sin($value['latitude']) +
    cos($latitude) * cos($value['latitude']) *
    cos(abs($longitude - $value['longitude']))
  );

  if($d < $min) {
    $res = $value;
    $min = $d;
  }
}

echo json_encode($res);
