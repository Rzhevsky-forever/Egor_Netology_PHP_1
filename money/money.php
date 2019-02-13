<?php
$content = array();
$date = date('Y-m-d'); // Вводим дату
/*-------- Проверяем массив на пустоту и получаем данные из командной строки Windows --------*/

if (isset($argv[1])) {

    for ($y = 1; $y < count($argv); $y++) { // Получаем и перезаписываем в переменную значения из командной строки
//        echo "y === $y \n"; // Testing
//        $count = count($argv); // Testing
//        echo "count === $count \n"; // Testing
        $content[0] = $date; // Записываем дату в массив данных
        $content[1] = $argv[1];
        if ($y === 2) $content[2] = NULL;
        if ($y > 1) {
            if ($y != (count($argv) - 1)) {
                $content[2] .= $argv[$y].' ';
            } else {
                $content[2] .= $argv[$y];
            }
        }
    }
    
    /*-------- Проверяем массив на наличие ключа '--today' зарезервированного нами для чтения и пишем данные в файл --------*/
    if ($content[1] != '--today') {
    $moneyAsResource = fopen("./money.csv", "a+"); // Создаем или открываем файл money.csv, и создаем сущьность языка типа "Resource" 
    fputcsv($moneyAsResource, $content); // Записываем данные о покупке в наш файл обращаясь, к файлу, как к "Resource"
    // Добавлена строка: 13.09.2018, 256.00, праздничный кекс
    echo 'Add string ' . $date . ' ';
        for ($i=0; $i < count($content); $i++) {
            if ($i > 0 ) {
//                var_dump($content);
                echo $content[$i] . ' ';
            }
        }
    }
    /*-------- Проверяем массив на наличие ключа '--today'. Считываем данные и подсчитываем значение и Выводим результат --------*/

    elseif ($content[1] == '--today') {
    $moneyAsArray = file("./money.csv", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // Открываем наш файл, как массив
    $sum = 0;
    for ($c=0; $c < count($moneyAsArray); $c++) { // Обращаемся к элементам массива по ключу
        $target[$c] = str_getcsv($moneyAsArray[$c], ','); // Формируем встроенный массив, в котором каждая подстрока CSV это отдельное поле. Пример - $target[$c == 0] это '2018-10-21' и т.д.
        for ($s = 0; $s < count($target[$c]); $s++) { // Обращаемся к вложенным элементам $target[$c], как к $target[$c][$s] 
            if ($target[$c][$s] == $date){ // Проверяем (читай находим) подмассив в котором первое поле это запрошенная дата
                    $sum += $target[$c][$s + 1]; // Способ обратиться к полю массива под следуюим индексом (после $target[$c][$0] то - есть $target[$c][$0 + 1]) 
            }
        }
    } 
    echo "\n\n" . $date . ' consumption per day: ' . $sum . "\n\n";
    }
}
else {
    echo 'ERROR';
}
?>	