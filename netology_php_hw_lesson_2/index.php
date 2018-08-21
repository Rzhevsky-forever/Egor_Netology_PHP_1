<!DOCTYPE html>
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
        
        $allAnimals = array(); // ПРеобразуем многомерный массив в одномерный
        foreach ($animals as $subArr) {
            $allAnimals = array_merge($allAnimals,$subArr);   
        }
       
        $newAnimals = array(); // Создаем массив в котором только звери из двух слов
        foreach ($allAnimals as $animalName) {
            if (strpos ($animalName, " ") !== FALSE) {
                array_push($newAnimals, $animalName);
            }
        }
       
        $all = array(); // Сортируем массив на два разных с первыми словами и со вторыми
        $ferst_word = array();
        $second_word = array();
        foreach ($newAnimals as $k => $v) {
            $word = explode(" ", $v);
            array_push($all, $word);
        }
        foreach ($all as $value) {
            foreach ($value as $key => $z) {
                if ($key < 1) {
                    array_push ($ferst_word, $z);
                } else {
                    array_push($second_word, $z);
                }
            }
        }
        
        shuffle($ferst_word); //Перемешиваем первые слова
            
        // Сливаем массивы
        $result = array() ;
        for ($i = 0; $i < count($ferst_word); $i++) {
           $a = $ferst_word[$i];
           $b = $second_word[$i];
           $result[$i] = $a . " " . $b;
           
        }
        
            
        print "<br><br>";
        var_dump($result);

        $q = "a";
        $v = "abv";
        $v2 = "ert";
        $q = $v . $v2;
        echo $q;
           
        ?>
    </body>
</html>


