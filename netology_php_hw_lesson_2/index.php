<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>lesson 2</title>
    </head>
    <body>
        <?php
        $animals = 
            ["africa" => 
            ["Mammuthus columbi", 
             "Loxodonta",
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
             "Zea", 
             "Felis silvestris"]];
        $allAnimals = array();
        foreach ($animals as $subArr) {
            $allAnimals = array_merge($allAnimals,$subArr);   
        }
        print_r($allAnimals);
        $newAnimals = array();
        foreach ($allAnimals as $animalName) {
            if (strpos ($animalName, " ") !== FALSE) {
                array_push($newAnimals, $animalName);
            }
        }
        print "<br><br>";
        print_r($newAnimals);
        
        $newAnimals_string = implode(",", $newAnimals); // создаем строку из массива для перемешивания
        print "<br><br>";
        echo $newAnimals_string;
        
//        shuffle($newAnimals);
        print "<br><br>";
        print_r($newAnimals);
        ?>
    </body>
</html>
