<?php
$date = date("d.m.Y"); // Сегодня
$dom = new domDocument("1.0", "cp1251");
$dom->loadXML(file_get_contents("http://www.cbr.ru/scripts/XML_daily.asp?date_req=$date"));
$root = $dom->documentElement;
$childs = $root->childNodes;
$data = array();
for ($i = 0; $i < $childs->length; $i++) {
$childs_new = $childs->item($i)->childNodes;
for ($j = 0; $j < $childs_new->length; $j++) {
$el = $childs_new->item($j);
$code = $el->nodeValue;
if ($code == "USD") $data[] = $childs_new;
}
}
for ($i = 0; $i < count($data); $i++) {
$list = $data[$i];
for ($j = 0; $j < $list->length; $j++) {
$el = $list->item($j);
if ($el->nodeName == "Name") echo $el->nodeValue." - ";
elseif ($el->nodeName == "Value") echo $el->nodeValue."<br />";
header('Content-Type: application/json');
}
}
?>