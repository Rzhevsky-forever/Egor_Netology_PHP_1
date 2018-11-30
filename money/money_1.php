<?php /*
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
*/
/*
$money = file("./money.csv", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // Остановил лекци на 20 - 17
for ($i=0; $i < count($money); $i++) { 
    echo $money[$i] . "\n";
}
*/
//echo "\n\n";

//$content[] = $argv; 
//echo "\n\n";
$date = date('Y-m-d');
for ($y = 1; $y < count($argv); $y++) {
    $content[$y] = $argv[$y];
}

var_dump($content); // Тестовый вывод
$money = fopen("./money.csv", "a+"); // Записываем данные в файл
fwrite($money, $date . ",");
fputcsv($money, $content);

/*
for ($i=0; $i < count($content); $i++) { 
    fputcsv($money, $content[$i]);
}
 */
//echo fread($money, filesize("./money.csv")) . " -- it is read";
echo "\n\n -- it is read -- \n\n";
$money = file("./money.csv", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // Выводим массив
for ($c=0; $c < count($money); $c++) {
    echo $money[$c] . "\n";
}
//echo "\n\n";
//var_dump($a);
//echo "\n\n\n\n";
/*
$money = file("./money.csv", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // Остановил лекци на 20 - 17
for ($i=0; $i < count($money); $i++) { 
    file_put_contents("./money.csv", $i);
}
*/
//echo "\n\n\n\n";
//
//file_put_contents("./money.csv", $content[$i] . ",", FILE_APPEND);
//
//var_dump($money);


// Остановил лекц. на 20 - 17 
?>
	