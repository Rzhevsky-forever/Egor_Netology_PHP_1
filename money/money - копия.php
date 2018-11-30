<?php
$a = array();
$a = array_merge($a, $argv); // Скорее всего тут ошибка
var_dump($a);
if (isset($a)) { // Проверяем $a на пустоту
//    echo "OKEY \n";
//    var_dump($a);
    $path = "./money.csv"; // Путь к файлу помещаем в переменную
    $filePath = fopen($path, "a+"); // алгоритм открытия файла и/или создания файла money.csv помещаем в переменную
    for ($i = 1; $i < count($a); $i++) { // Открываем перерменную в которой содержится данные глобального массива
        fputcsv($filePath, $a); // добавляем данные из глобального массива в файл CSV
        
    }
    $return = fgetcsv(fopen($path, "r")); $ret = $return; // Получаем файлы из CSV
        for ($j = 0; $j < count($ret); $j++) { // Открываем массив из файла CSV 
            echo $ret[$j] . "\n"; // Печатаем данные из CSV
        }
    var_dump(count($return));
} else { echo "NO";} echo "\n"; // Если массив argv пустой печатаем это
fclose($filePath); // Закрываем файл для экономии файла


?>
	