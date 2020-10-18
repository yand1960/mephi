<?php
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'http://www.cbr-xml-daily.ru/daily_json.js');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$json = curl_exec($ch);
	curl_close($ch);

	$result = json_decode($json, true);
	$return_value = array();
	$return_value['time'] = date('Y-m-d H:i:s');
	$return_value['rate'] = $result['Valute']['USD']['Value'];
	header('Content-Type: application/json');
	echo json_encode($return_value);