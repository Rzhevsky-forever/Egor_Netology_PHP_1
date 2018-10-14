<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" lang="ENG">
        <title>lesson 2</title>
        <!--- STYLE --->
        <link rel="stylesheet" href="lesson_2.css" type="text/css">
        <!---FONTS--->
        <link href="https://fonts.googleapis.com/css?family=Hammersmith+One|Playfair+Display:400,700,900|Roboto:100,300,400,900&amp;subset=cyrillic-ext" rel="stylesheet">
    </head>
    <body>
<?php
$y = 0;
$result = array() ;
$animals = 
    ["africa" => 
    ["Mammuthus columbi",
    "Qweqweq qweqweqwe qweqweqwe",
    "Loxodonta",
    "Ring martishka",
    "Giraffa camelopardalis", 
    "leo", "Homo sapiens"],
    "eurasia" =>
    ["Canis lupus", 
     "Ursus", 
     "Bos taurus",
     "Oryctolagus cuniculus",
     "Vulpes"],
    "amerika" => 
    ["Equus ferus", 
     "Babyrousa",
     "Neurotrichus gibbsii", 
     "Zea", "adsasd cotus yuryu", "Esho tam",
     "Felis silvestris", "Lupus ululupus"]];

$allAnimals = array(); // Преобразуем многомерный массив в одномерный
foreach ($animals as $sub) {
    $allAnimals = array_merge($allAnimals,$sub);
    $newAnimals = array(); // Создаем массив в котором только звери из двух слов
    foreach ($allAnimals as $animalName) {
        if (strpos ($animalName, " ") !== FALSE && substr_count($animalName, " ") < 2) { //Проверяем есть ли в троке $animalName пробел (" ") и если есть и меньше двух  - пропускаем
            array_push($newAnimals, $animalName); // Создаем новый массив куда добавляем все строки с кол-вом пробелов >1 и <2
        }
        // Сортируем массив на два разных с первыми словами и со вторыми
        $ferst_word = array();
        $second_word = array();
        foreach ($newAnimals as $k => $v) {
        $word = explode(" ", $v);
            foreach ($word as $index => $value) {
                if ($index < 1) { 
                    array_push ($ferst_word, $value);
                    shuffle($ferst_word); // Перемешиваем значения массива с первыми словами
                } else {
                    array_push($second_word, $value);
                }
            }
        }
    }
}
    // Сливаем массивы
?>
        <div class="wrapper castom-animals">        
<?php
    $x = count($ferst_word);
    while ($y < $x) {
       $a = $ferst_word[$y];
       $b = $second_word[$y];
       $result[$y] = $a . " " . $b;
       echo "<p class = 'wrapper'>$result[$y]</p>";
       $y = $y + 1;
    }
        ?>
        </div>
    </body>
</html>


