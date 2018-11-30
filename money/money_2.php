<?php
$date = date('Y-m-d'); // Вводим дату
for ($y = 1; $y < count($argv); $y++) { // Получаем и перезаписываем в переменную значения из командной строки
    $content[$y] = $argv[$y];
}

//var_dump($content); // Тестовый вывод

$moneyAsResource = fopen("./money.csv", "a+"); // Создаем или открываем файл money.csv, и создаем сущьность языка типа "Resource" 
//echo "\n\n --------- money is  --------- \n\n"; // Проверяем результат
//var_dump($moneyAsResource); // Проверяем результат
fwrite($moneyAsResource, $date . ","); // Записываем дату в наш файл, обращаясь к файлу, как к "Resource"
fputcsv($moneyAsResource, $content); // Записываем данные о покупке в наш файл обращаясь, к файлу, как к "Resource"

/*-------- Считываем данные и Выводим массив --------*/
$moneyAsArray = file("./money.csv", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // Открываем наш файл, как массив
echo "\n\n --------- money is  --------- \n\n"; // Проверяем результат
var_dump($moneyAsArray); // Проверяем результат
echo "\n\n --------- it is read --------- \n\n"; // Делаем что-бы было красиво
for ($c=0; $c < count($moneyAsArray); $c++) { // Обращаемся к элементам массива по ключу
    echo $moneyAsArray[$c] . "\n"; // Выводим значения
}

// Остановил лекц. на 20 - 17 
?>
	