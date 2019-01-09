<?php
/*========================================= MAIN ==============================================*/

/*---------------------------- Подключаем необходимые библиотеки ------------------------------*/
include_once 'date.php';
include_once 'filterAdminDate.php';
// Подключить фильтр

//if (isset($_POST) && !empty($_POST)) { // Проверяем определился ли POST

class News
{   
    // Возвращаемые свойства
        private $news;
    
    // Служебные свойства :
    
        // - Свойства для имен новостей
        private $newsTitle; // Служит для определения заголовка новости
        private $newsName; // Служит для определения имени новости
        private $newsText; // Служит для определения текста новости

        // - Свойства для путей
        private $puthToRutCatalog = 'NewsContentRut/';
        private $puthToNewsCatalog = 'newsCatalog/'; // Создаем имя для пути в корневой каталог новостей
        private $cat; // Совместно с $puthToRutCatalog служит для констрирования пути в каталог содержащий собственно файлы новостей (уровень вложенности 1) 
        private $puthToFile; // Служит для определения пути в конкретный каталог содержащий новость

        // - Дата
        private $date; // Дата
        
        // - Счетчик
        private $counterNews = 1; // Счетчик новости. Служит для определения порядка загрузки / чтения
        
    function getCounterNews () {
        /*------------------------------- Создаем счетчик для управления очередью вывода новостей --------------------------------*/
        $open = opendir($this->puthToRutCatalog . $this->puthToNewsCatalog); // Открываем корневую директорию 
        while (($readDir = readdir($open)) !== FALSE) { // считываем имена подпапок пока не получим пустоту (уровень вложенности 1)
            if ($readDir !== '.' && $readDir !== '..') {                 
                $this->counterNews ++; // Прибавляем к счетчику единицу при каждой итерации цикла, таким образом последнее числительное счетчика - есть последний номер "новости" по порядку
            }
        }
    }
                
    function getNews ($someNews, $date)
    {
       /*---------------------------------- Извлекаем данные из $_POST ----------------------------------*/
        $this->date = $date;
            if (!empty ($someNews)) { // Проверяем, не пустой ли наш массив содержащий данные из $_POST. Если массив с данныемы из $_Post не пустой выполняется следующий код
                foreach ($someNews as $key => $value) { 
                    if ($key === 'newsTitle') {
                        if (!empty($value)) {
                            $this->newsTitle = $value; // Создаем переменную названия заголовка
                            $this->newsName = $this->counterNews . '_' . $value; // Переменная отражающая именно имя, а не заголовок понадобится нам в последствии. Снабжаем имя новости порядковым номером для управления порядком вывода
                        } else {
                            $this->newsTitle = 'Заголовок вашей новости от ' . $this-> date . ' пустой';
                            $this->newsName = $this->counterNews . '_' . $this-> date; // Переменная отражающая именно имя, а не заголовок понадобится нам в последствии. Снабжаем имя новости порядковым номером для управления порядком вывода
                        }
                    }
                    if ($key === 'newsText') {
                        if (!empty($value)) {
                            $this->newsText = $value; // $value текст новости
                        } else {
                            $this->newsText = 'Текст вашей новости от ' . $this-> date . ' пустой';
                        }
                    }
                } 

        /*---------------------------------- Создаем каталог с новостью -------------------------------*/
            $this-> cat = $this->newsName . '/'; // Создаем имя подкаталога с новостью (уровень вложенности 1)
            $this-> puthToFile = $this->puthToRutCatalog . $this-> puthToNewsCatalog . $this-> cat; // Создаем имя пути для каталога новости (уровень вложенности 2)
            // Проверяем передавалась ли раньше такая новость
            $handle = (opendir($this->puthToRutCatalog . $this-> puthToNewsCatalog)); // Создаем ресурс для чтения потока из директории файловой системмы
            $free = TRUE; // Индикатор занятости имени в файловой системе (иммитирует свободно = да)
            while (($file = readdir($handle)) !== FALSE) { // считываем существущие имена файлов
                if ($file === $this-> newsName){ // Проверяем есть ли имя файла нашей новости
                    $free = FALSE; // если есть индикатор переключается на FALSE (не верно)
                } 
            }
            if ($free !== FALSE) mkdir($this-> puthToFile); // Создаем подкаталог с названием $newsName (именем новости)

        /*---------------------------------- Пишем файл содержащий Новость -----------------------------*/
            // Пишем файл содержащий заголовок
            $someFile = fopen($this-> puthToFile . $this-> newsName . 'Title' . '.txt', 'w'); // Создаем файл с Заголовком в каталоге
            fwrite($someFile, $this-> newsTitle); // Пишем данные в файл
            fclose($someFile); // Закрываем файл

            // Пишем файл содержащий Текст
            $someFile = fopen($this-> puthToFile . $this-> newsName . 'Text' . '.txt', 'w'); // Создаем файл с Текстом в каталоге
            fwrite($someFile, $this-> newsText);
            fclose($someFile);
        }
    }
    
    function setNews ()
    {
        /*---------------------------------------- Считываем файл ----------------------------------------------*/
        $openDirRut = opendir($this-> puthToRutCatalog . $this-> puthToNewsCatalog); // Открываем Корневой уровень вложенности (общая папка новостей)
        while (($readDirNews = readdir($openDirRut)) !== false) { // $readDirNews - имена подпапок
            if ($readDirNews !== '.' && $readDirNews !== '..') { // Отделяем ресурсы "." и "..".
                $openDirFerst = opendir($this-> puthToRutCatalog . $this-> puthToNewsCatalog . $readDirNews); // Открываем Первый уровень вложенности (подпапки)
                    while (($readNewsName = readdir($openDirFerst)) !== false) { // ($readNewsName - это имена файлов)
                        if ($readNewsName !== '.' && $readNewsName !== '..') { // Отделяем ресурсы "." и "..".
    //echo $this-> puthToRutCatalog . $this-> puthToNewsCatalog . $readDirNews . '/' . $readNewsName . '<br />'; // Вот такой способ отладки отлично работает если надо понять каково положение директории внутри дерева католога
                            $openFile = fopen($this-> puthToRutCatalog . $this-> puthToNewsCatalog . $readDirNews . '/' . $readNewsName, 'r'); // Открываем Второй уровень вложенности (файлы в подпапках)
                            if (strpos($readNewsName, 'Title.txt')) { // Проверяем является ли файл - заголовком
                                $this->news[(int)$readDirNews][0] = fread($openFile, filesize($this-> puthToRutCatalog . $this-> puthToNewsCatalog . $readDirNews . '/' . $readNewsName)); // $isNewsTitle/Text - данные из файлов
                            } 
                            if (strpos($readNewsName, 'Text.txt')) {
                                $this->news[(int)$readDirNews][1] = fread($openFile, filesize($this-> puthToRutCatalog . $this-> puthToNewsCatalog . $readDirNews . '/' . $readNewsName));
                            }
                        }
                    }
            }
        }
        krsort($this->news); // Сортируем массив по убыванию
        return ($this->news); // Возвращаем значение
    }
}

$news = new News();
$news->getCounterNews();
$news->getNews($someNews, $date);
$currentNews = $news->setNews();