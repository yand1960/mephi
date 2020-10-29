<?php
function getCurs(){
    $xml = new DOMDocument();
    $url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . date('d.m.Y');

    if ($xml->load($url)){
        $result = array(); 
        $root = $xml->documentElement;
        $items = $root->getElementsByTagName('Valute');
        foreach ($items as $item){
            $code = $item->getElementsByTagName('CharCode')->item(0)->nodeValue;
            $value = $item->getElementsByTagName('Value')->item(0)->nodeValue;
            $result[$code] = str_replace(',', '.', $value);
        }
        return $result['USD'];
    }else{
        return false;
    }
}
$now = date("Y-m-d H:i:s");
$kurs = getCurs();
echo "{\"time\": \"$now\", \"rate\": \"$kurs\"}";
