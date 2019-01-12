<?php
// Запускаем сессию и проверяем кто к нам стучиться
session_start();
// Отлавливаем не зарегистрированных пользователей
if (empty($_SESSION['role']) || ($_SESSION['role'] === 'alen')) {
    header('Location: index.php');
}
var_dump($_SESSION); // Testing
echo '<br />'; // Testing
print_r (empty($_SESSION['role'])); // Testing
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>Тест</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <form name="TestInter" method="POST" action="test.php">
            
<?php
//var_dump($_GET); // Testing
$answer = filter_input(INPUT_POST, 'test'); // Получаем ответ от пользователя
$test = filter_input(INPUT_GET, 'test'); // Приходит имя файла теста которое отражает название теста. Строчный атрибут указанный вторым означает строчный ключ массива данные из которого получаем и обрабатываем через filter_input
//var_dump($test); // Testing
$del = filter_input(INPUT_GET, 'del'); // Читаем значение из переменной $_GET['del']. Если она  передана будем удалять тест
//var_dump($del); // Testing
//echo '<br>'; // Testing
if (!isset($answer) && !isset($test)){ // В ситуации если не выбран тест и не пришел вариант ответа на тест
    die('Обратитесь в техническую поддержку'); // Останавливаем выполнение скрипта
}
if (empty($answer)){ // Обработка ответа
    if (!empty($test)) { // Обработка контента теста при получение
        $pathToFile = 'tests/' . $test; // Формируем путь до файла (относительный) с учетом имени файла
        if ($del != NULL) {
            echo 'Зашли в удаление'; // Testing
            unlink($pathToFile); // Удаляет файл теста в случае если были полученные соответствующие данные
            die('тест ' .$test. ' был удален');
        }
        file_put_contents('tests/' . 'markerTest.txt', $test); // Пишет файл который содержит информацию о том с каким тестом сейчас работаем
        $fileTest = file_get_contents($pathToFile); // Считываем файл по пути из прошлой строки
        $encoding = mb_detect_encoding($fileTest, 'UTF-8', 'Windows-1251'); // Вычмсляем кодировку, без двух последних флагов(возможные кодировки) не работет и возвращает UTF-8 всегда
        if (!($encoding === 'UTF-8')) { // Проверяем кодировку UTF-8 или нет
           $fileUTF = mb_convert_encoding($fileTest, 'UTF-8', 'Windows-1251'); // Если НЕ UTF-8 - меняем кодировку на UTF-8 (!! Добавление третьим аргументом исходной кодировки('Windows-1251') исправило проблемму когда символы в этой кодировки перекодировались в "?????..." !!)
        } else {
           $fileUTF = $fileTest;
        }
        $decodeTest = json_decode($fileUTF, TRUE); // Декодируем json и переписываем в массив PHP 
        foreach ($decodeTest as $part => $content) {
            if ($part !== 'answer :'){
                foreach ($content as $test => $val) { ?>
                            <p class="content"> 
                                <?php echo $test; ?> <!-- Вывод текста вопроса -->
                            </p>  
                            <div class="radio_form">
                        <?php foreach ($val as $questionName => $possibleAnswer) { ?>
                            <div class="radio_buttom test content">
                                <input type="radio" name="test" value="<?php echo $possibleAnswer; ?>"> <p><?php echo $possibleAnswer; ?></p>
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
    <?php }
// Cравниваем ответ данный пользователем с правильным    
} elseif (!empty ($answer)){ // Слушаем переменную POST и ждем пока придет ответ
// Ищем файл в котором записан обрабатываемый тест и получаем ответ из теста
    $testsCatalog = 'tests/'; // Определяем переменную под имя каталога
    $scanCatalog = scandir($testsCatalog); // просматриваем вложенные элементы и записываем их наименования в массив
    foreach ($scanCatalog as $key => $value) { // Итерируем массив получаем, получаем значения
        if (strpos($value, '.txt')) { // Ищем файл .txt 
            $currentTest = file_get_contents($testsCatalog . $value); // Получаем запись из этого файла, запись нам говорит какой тест мы обрабатываем
        }
    }
    $testString = file_get_contents($testsCatalog . $currentTest); // Получаем данные из файла теста
    $testArrayDecode = json_decode($testString, TRUE); // Преобразуем данные в массив
// Ищем значение правильного ответа
    foreach ($testArrayDecode as $key => $value) { // Итерируем массив
        if ($key === 'answer :') { // Ищем ключ 'answer :'
            foreach ($value as $k => $v) { // Открываем значение по ключу 'answer :'
                $correctAnswer = $v; // Пишем в переменную прпавльноый ответ
            }
        }
    }
    if ((int)$answer === $correctAnswer) { // Проверяем совпадает ли ответ данный пользователем с верным из файла теста
        echo 'Правильно'; // Печатаем если совпадает ?>
        <?php var_dump($_SESSION); // Testing ?>
        <img src="resources/image/congratulation.php"
    <?php }
    else { // Если не совпадает
        echo $answer . ' - Это не правильный ответ :)'; // Печатаем это
    }
}
else { // Если что - то пошло не так
    echo 'Что - то пошло не так';
}
   
?>
        </form>
    </body>
</html>