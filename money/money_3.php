<?php
/*-------- Проверяем массив на пустоту и записываем данные --------*/
if (isset($argv[1])) {
//echo "\n\n --------- argv is  --------- \n\n"; // Проверяем результат
//var_dump($argv[1]); // Проверяем результат
$date = date('Y-m-d'); // Вводим дату
for ($y = 1; $y < count($argv); $y++) { // Получаем и перезаписываем в переменную значения из командной строки
    $content[0] = $date; // Записываем дату в массив данных
    $content[$y] = $argv[$y];
}
//echo "\n\n --------- content is  --------- \n\n"; // Проверяем результат
//var_dump($content); // Тестовый вывод
$moneyAsResource = fopen("./money.csv", "a+"); // Создаем или открываем файл money.csv, и создаем сущьность языка типа "Resource" 
//echo "\n\n --------- money is  --------- \n\n"; // Проверяем результат
//var_dump($moneyAsResource); // Проверяем результат
//fwrite($moneyAsResource, $date . ","); // Записываем дату в наш файл, обращаясь к файлу, как к "Resource"
fputcsv($moneyAsResource, $content); // Записываем данные о покупке в наш файл обращаясь, к файлу, как к "Resource"
}

/*-------- Считываем данные и подсчитываем значение и Выводим массив --------*/

$moneyAsArray = file("./money.csv", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // Открываем наш файл, как массив
echo "\n\n --------- money is  --------- \n\n"; // Проверяем результат
//var_dump($moneyAsArray); // Проверяем результат

$sum = 0;
$day = 0;
echo "\n\n --------- it is read --------- \n\n"; // Делаем что-бы было красиво
for ($c=0; $c < count($moneyAsArray); $c++) { // Обращаемся к элементам массива по ключу
    $target[$c] = str_getcsv($moneyAsArray[$c], ','); // Формируем встроенный массив, в котором каждая подстрока CSV это отдельное поле. Пример - $target[$c == 0] это '2018-10-21' и т.д.
//  var_dump($target[$c]);
    for ($s = 0; $s < count($target[$c]); $s++) { // Обращаемся к вложенным элементам $target[$c], как к $target[$c][$s] 
//      var_dump($target[$c][$s]);
        if ($target[$c][$s] == '2018-10-21'){ // Проверяем (читай находим) подмассив в котором первое поле это запрошенная дата
                $sum += $target[$c][$s + 1]; // Способ боратиться к полю массива под следуюим индексом (после $target[$c][$0] то - есть $target[$c][$0 + 1]) 
            echo "\n\n" . $target[$c][$s + 1] . "\n\n"; // Тестовый вывод
        }
    }
} 
//var_dump($target);
echo "\n\n" . "it is return " . $day . ' string ' . $sum . "\n\n";
// Остановил лекц. на 20 - 17 

/*
switch ($target[$c][$s]) {
            case '2018-10-21':
                var_dump($target[$c][$s]);
                $day = $target[$c][0];
                $sum += $target[$c][$s];

        }
 *  */
?>
	