<?php
function get_course() {
    $xml = simplexml_load_file('http://cbr.ru/scripts/XML_daily.asp');
    $course = array();
    foreach ($xml->xpath('//Valute') as $valute) {
        $course[(string)$valute->CharCode] = (float)str_replace(',', '.', $valute->Value);  
    }
    return $course;
}

// Курс валют 
$course = get_course();
print "<h3>Курс доллара:</h3>";
echo $course['USD'];  
print "<h3>Курс евро:</h3>";
echo $course['EUR'];	