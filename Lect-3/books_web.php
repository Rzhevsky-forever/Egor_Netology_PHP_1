<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Книги</title>
    </head>
    <body>
        <form method="POST" action="">
            <p>Найти книгу :</p>
            <input type="text" name="query">
            <input type="submit" value="Найти эту книгу">
        </form>
    </body>
</html>

<?php

// Рекурсивная функция итерации многомерного ассоциативного массива (итерация по дереву вложенности)
function writer($file, $fields, $level = -1, $space = '') {
    static $namber = 0;
    if (is_array($fields)) {
        $level ++;
        $space .= '    ';
        foreach ($fields as $key => $value){
            $namber++;
            if (is_array($value)) {    
                print "№$namber; уровень вложенности : $level; $space $key - <br>";
                $arr = [$key, ''];
                fputcsv($file, $arr, ',');
                writer($file, $value, $level, $space);
            }
            else {
                print "№$namber; уровень вложенности : $level; $space $key - $value <br>";
                $arr = [$key, $value, ''];
                fputcsv($file, $arr, ',');
            }
        }
    }
}

// Фильтруем данные пришедшие от пользователя
$post_value = iconv ('UTF-8', 'Windows-1251', filter_input(INPUT_POST, 'query'));

// Запрашиваем файл
// Проверяем пришел ли запрос от пользователя
if (isset($post_value) && !empty($post_value)) {
    // Экранируем символы которые портят запрос
    $query = urlencode($post_value) . '&startIndex=0&maxResults=1';
    // Отправляем запрос
    $json_string = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=$query&startIndex=0&maxResults=1");
    
    // Проверяем строку на наличие ошибок
    if (json_decode($json_string)) {
        $json_array = json_decode($json_string, TRUE);
        
        // Если ошибок нет пишем CSV
        // Создаем или открываем файл 
        $creatFile = fopen("./$post_value.csv", "a");
        
        // Вызываем функцию записи и пишем файл
        echo '<pre>';
        writer($creatFile, $json_array);
        echo '</pre>';

        // Закрываем файл
        fclose($creatFile);
    } else {
        $error = json_last_error_msg();
        echo "Не правильная строка JSON ($error)";
    }
} else {
    echo 'Запрос не отправлен. Отправьте запрос';
}