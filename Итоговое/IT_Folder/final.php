<?php

$url = $_GET["url"];
$text = $_GET["text"];

$html = file_get_contents($url);
$count = substr_count($html,$text);
echo json_encode([
  'status' => true,
  'count' => $count,

]);





?>