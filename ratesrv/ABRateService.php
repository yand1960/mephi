<?php
  $date = date("d/m/Y"); // Сегодняшняя дата в необходимом формате
  $link = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=$date"; // Ссылка на XML-файл с курсами валют
  $content = file_get_contents($link); // Скачиваем содержимое страницы
  $dom = new domDocument("1.0", "cp1251"); // Создаём DOM
  $dom->loadXML($content); // Загружаем в DOM XML-документ
  $root = $dom->documentElement; // Берём корневой элемент
  $childs = $root->childNodes; // Получаем список дочерних элементов
  $data = array(); // Набор данных
  for ($i = 0; $i < $childs->length; $i++) {
    $childs_new = $childs->item($i)->childNodes; // Берём дочерние узлы
    for ($j = 0; $j < $childs_new->length; $j++) {
      /* Ищем интересующие нас валюты */
      $el = $childs_new->item($j);
      $code = $el->nodeValue;
      if (($code == "USD") || ($code == "EUR")) $data[] = $childs_new; // Добавляем необходимые валюты в массив
    }
  }
  /* Перебор массива с данными о валютах */
  for ($i = 0; $i < count($data); $i++) {
    $list = $data[$i];
    for ($j = 0; $j < $list->length; $j++) {
      $el = $list->item($j);
      /* Выводим курсы валют */
      if ($el->nodeName == "Name") echo $el->nodeValue." - ";
      elseif ($el->nodeName == "Value") echo $el->nodeValue." рублей<br />";
    }
  }
?>