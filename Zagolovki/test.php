<!DOCTYPE html>
<!--
To change this license header, choose Licens Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>Тест</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <form name="TestInter" method="POST" action="test.php">
            
<?php
$otvet = filter_input(INPUT_POST, 'test'); // Перезаписываем и фильтруем данные из POST в внутреннюю переменную (лечим внутреннюю ошибку Net Beans)
if (empty($otvet)){
    if (!empty($_GET)) { // Проверяем на пустоту массив $_GET
//       var_dump($_GET); //  array(2) { ["test"]=> string(11) "test_2.json" ["name"]=> string(8) "Вася" }
        include_once './makeUserName.php';
        makeUserName();
        /*
        echo '<hr />';
        var_dump(makeUserName());
        echo '<hr />';
         * 
         */
         $test = filter_input(INPUT_GET, 'test'); // Строчный атрибут указанный вторым проверяет наличие этой строки в INPUT_GET и возвращает это значение, а в настоящем случае пишет в переменную  
         $pathToFile = "tests/" . $test; // Формируем путь до файла (относительный) с учетом имени файла
         if ($opendir = opendir("./tests")) { // Открывем директорию, в которую сохраняются тесты $opendir - есть сущность типа resource ( var_dump($opendir); -> resource(3) of type (stream) )
            $n = 0; while (($readDir = readdir($opendir)) !== FALSE) { // Проходим директорию в которой сохраняются тесты и считываем имена файлов. $n = 0; - это переменная счетчик - переключатель индексов полей массива
                if ($readDir != '.' && $readDir != '..') { // Проверяем не возвращается ли нам '.' && '..', если возвращаются точки не пишем ни чего, если нормальное название файла пишем его
                    $catalogList[$n] = $readDir; //Создаем массив который будет содержать перечень файлов в каталоге $opendir. При возврате "чистого"(после валидации) имени файла пишем его в массив. 
                    $n += 1; // Прибавляем 1 к переменной - счетчику который переключает индексы полей массива
                }
            }
         }
//        var_dump($test);         echo '<br></br>';      var_dump($catalogList); // Тестовый вывод
        for ($n = 0; $n < count($catalogList); $n += 1) {
           if ($test == $catalogList[$n] ) { // Проверяем сходятся ли название файла которые выбрал пользователь с теми, что были загруженные ранее, если сходятся отдаем тесты если не сходятся делаем редирект
               $boolTest  = TRUE;
               break;
           }   
        }
        $boolTest === TRUE ? NULL : http_response_code(404); // Если Файл выбранный пользователем сходиться с любым из ранее загруженных, то эта строчка ни чего не будет делать  - NULL
        // Если выбранный файл не сходиться с загруженными ранее, то будет выполняться переход на страницу 404
//      echo '<br><br> Этот код - header($pathToFile);';             
        $fileTest = file_get_contents($pathToFile);  // Считываем файл по пути который (путь) записан в переменную $pathToFile
        $codirovka = mb_detect_encoding($fileTest, 'UTF-8', 'Windows-1251'); // Вычмсляем кодировку, без двух последних флагов(возможные кодировки) не работет и возвращает UTF-8 всегда
        if (!($codirovka === "UTF-8")) { // Проверяем кодировку UTF-8 или нет
           $fileUTF = mb_convert_encoding($fileTest, 'UTF-8', 'Windows-1251'); // Если НЕ UTF-8 - меняем кодировку на UTF-8 (!! Добавление третьим аргументом исходной кодировки('Windows-1251') исправило проблемму когда символы в этой кодировки перекодировались в "?????..." !!)
        } else {
           $fileUTF = $fileTest;
        }
        $decodeTest = json_decode($fileUTF, TRUE); // Декодируем json и переписываем в массив PHP 
        foreach ($decodeTest as $key => $value) {
            foreach ($value as $test => $namber) {
                foreach ($namber as $k => $v) { ?>
                            <p class="content"> 
                                <?php echo $k; ?>
                            </p>  
                            <div class="test_wrapper">
                    <?php
                    foreach ($v as $a => $variants) { ?>
                                <div class="radio_buttom test content">
                                    <input type="radio" name="test" value="<?php echo $variants; ?>"> <p><?php echo $variants; ?></p>
                                </div>
                    <?php
                    }
                }
            }
        } ?>
                            </div>
       <div class="radio_buttom">
           <input class="content" type="submit" value="Выбрать">
       </div>
       <?php
    }
} elseif (isset ($otvet)){
    if ($otvet == 8 || $otvet == 1000 || $otvet == 78) {
//        echo 'Правильно!';
//        include_once 'image/congratulation.php';
        ?>
            <img src="image/congratulation.php"
        <?php
    } else {
        echo $otvet . ' - Это не правильный ответ :)';
    }
  } 
?>
        </form>
    </body>
</html>
