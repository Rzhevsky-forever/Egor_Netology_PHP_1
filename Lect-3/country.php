<?php
// Получаем значение из $argv
$request[1] = $argv[1];

// Объявляем переменную адреса
$handle = 'data-20180609T0649-structure-20180609T0649.csv';
//print_r($webhandle); // Testing

// Получаем данные в виде строки
$content = file_get_contents($handle);
//print_r($urlContent); // Testing

// Меняем кодировку на кодировку отображаемую командной строкой Win
$content_CP866 = iconv('UTF-8', 'CP866//TRANSLIT', $content);

// Преобразуем данные в массив
 $contentArray = str_getcsv($content_CP866, ',');
// var_dump($urlContentArray); // Testung
 
// Выводим данные по запросу 
if (isset($request[1])) {
    for($i = 0; $i < count($contentArray); $i++) {
       if ($contentArray[$i] === $request[1]) {
           echo $contentArray[$i] . ' : '. substr($contentArray[$i + 3], 0, -2) . '<br />';
       }
   }
}   
?>

