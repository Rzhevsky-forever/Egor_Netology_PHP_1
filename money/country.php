<?php
/*
//$webhandle = 'https://data.gov.ru/opendata/7704206201-country/data-20180609T0649-structure-20180609T0649.csv?encoding=UTF-8';
$webhandle = 'https://raw.githubusercontent.com/netology-code/php-2-homeworks/master/files/countries/opendata.csv';
//$handle = './data-20180609T0649-structure-20180609T0649.csv';
//var_dump($handle);
var_dump($webhandle);
$countrysReed = fopen($webhandle, 'r');
var_dump($countrysReed);
//$countrysCSV = fgetcsv($countrysReed);
$fgt = file_get_contents($webhandle);
 * */

$response = file_get_contents("https://samples.openweathermap.org/data/2.5/weather?q=London,uk&appid=b6907d289e10d714a6e88b30761fae22", TRUE);
        //Адрес тестовый! Его заменить на Уфу надо
        file_put_contents("./weather.json", $response);
        var_dump($response);
        if ($response === FALSE) {
            $response = file_get_contents("./weather.json");
        } else {
            $cache = [
                "data" => date("Y-m-d"),
                "content" => json_decode($response)
                ];
        file_put_contents("./weather.json", $cache);    
        }
        $weaver = file_get_contents($cache, TRUE);
        var_dump($weaver);

?>

