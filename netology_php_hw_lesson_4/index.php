<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>Список клиентов</title>
        <link rel="stylesheet" href="lesson_fore_style.css"/>
    </head>
    <body>
<?php
        // Создаем массив данных. Берем многомерный массив
            $klients_list  = [
                ["name" => "Ваня", "lastname" => "Клюков", "age" => 25, "sex" => "man", "kol-voVisitov" => 2, "married" => FALSE, "income" => 15000],
                ["name" => "Света", "lastname" => "Сидорова", "age" => 42, "sex" => "wuman", "kol-voVisitov" => 1, "married" => TRUE, "income" => 25000],
                ["name" => "Гюльназира", "lastname" => "Ядыгарова", "age" => 22, "sex" => "wuman", "kol-voVisitov" => 4, "married" => NULL, "income" => 18000],
                ["name" => "Артем", "lastname" => "Тухватулин", "age" => 25, "sex" => "man", "kol-voVisitov" => 5, "married" => NULL, "income" => 8000],
                ];
            
                // Перекодируем массив из PHP массива в JSON список, для этого создаем новую переменную, в нее записываем строку которую за тем будем передовать в JSON 
                $json_klients_list = json_encode($klients_list, JSON_UNESCAPED_UNICODE); //Флаг "JSON_UNESCAPED_UNICODE" обеспечивает корректную передачу крирллицы
                //echo $json_klients_list; // Промежуточный вывод массива как строки
                file_put_contents(__DIR__ . '/spisok.json', $json_klients_list); // Собственно передаем содержимое переменной JSON файл
                
                // Получаем данные из JSON, которые мы туда передали, обратно в PHP в виде массива
                $string_klients_list = file_get_contents(__DIR__ . '/spisok.json'); // Получаем списко JSON, в PHP он сейчас строка. Сохраняем его в переменную
                $php_klients_list = json_decode($string_klients_list, TRUE); // Полученный список перекодируем в массив PHP с помощью соотв. ф-ции.
                print "<br>" . "<br>"; // Отступы строк
                //var_dump($php_klients_list); // Промежуточный вывод резуль
                
                // Парсим полученный массив и выводим в таблицу значение
                ?>
                <table>
                    <?php foreach ($php_klients_list as $value) { //Парсим
                        if (boolval($value['married']) == TRUE) { // Проверяем на тип, если тип булевый переопределяем в трочный ДА/Нет соотв.
                           $value['married'] = 'Да';
                        } else {
                            $value['married'] = 'Нет';
                        }
                        ?>
                    <tr> <!-- Выводим значения в таблице-->
                        <td class="userinfo"><?php echo $value['name']; ?></td>
                        <td class="userinfo"><?php echo $value['lastname']; ?></td>
                        <td class="userinfo"><?php echo $value['age']; ?></td>
                        <td class="userinfo"><?php echo $value['sex']; ?></td>
                        <td class="userinfo"><?php echo $value['kol-voVisitov']; ?></td>
                        <td class="userinfo"><?php echo $value['married']; ?></td>
                        <td class="userinfo"><?php echo $value['income']; ?></td>
                    </tr>
                     <?php } ?>
                </table>
    
        
    </body>
</html>
