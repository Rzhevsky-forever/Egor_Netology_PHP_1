<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Страны и режимы възда</title>
    </head>
    <body>
        <form method="POST" action="">
            <p>Узнать режим въезда в :</p>
            <input type="text" name="request">
            <input type="submit" value="Узнать">
        </form>
    </body>
</html>

<?php
// Получаем значение из POST
$request = filter_input(INPUT_POST, 'request', FILTER_SANITIZE_STRING);
//var_dump($request); // Testing

// Объявляем переменную адреса
$webHandle = 'https://data.gov.ru/opendata/7704206201-country/data-20180609T0649-structure-20180609T0649.csv?encoding=UTF-8';
//print_r($webhandle); // Testing

// Получаем данные в виде строки
$urlContent = file_get_contents($webHandle);
//print_r($urlContent); // Testing

// Преобразуем данные в массив
 $urlContentArray = str_getcsv($urlContent, ',');
// var_dump($urlContentArray); // Testung
 
// Выводим данные по запросу 
if (isset($request)) {
    for($i = 0; $i < count($urlContentArray); $i++) {
       if ($urlContentArray[$i] === $request) {
           echo $urlContentArray[$i] . ' : '. substr($urlContentArray[$i + 3], 0, -2) . '<br />';
       }
   }
}   
?>

