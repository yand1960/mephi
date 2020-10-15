<?php

$result = rand(90,100);
$now = date("H:i:s");

echo "{\"value\": \"$result\", \"time\": \"$now\"}";
