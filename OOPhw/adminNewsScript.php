<?php

/* 
 * PHP_EOL // Перенос строки для разных ОС
 * nl2br(' '.PHP_EOL.' '.PHP_EOL.' ') // Перенос строки для браузера
 */

//include_once './newsClass.php';

class News
{
    private $newsTitle;
    private $newsText;
//    private $image;
    
    public function setNews ($newsTitle, $newsText)
    {
        $this->newsTitle = $newsTitle;
        $this->newsText = $newsText;
    }
    
    public function getNews ($newsTitle, $newsText)
    {
        echo $this->newsTitle;
        echo $this->newsText;
    }
    
    public function getNewsTitle ($newsTitle)
    {
        echo $this->newsTitle;
    }
    
    public function getNewsText ($newsText)
    {
        echo $this->newsText;
    }
}

$newsTitle = (isset($_POST)) ? $_POST["NewsTitle"] : 'ОШИБКА В $_POST';
//var_dump($newsTitle);

$newsText = (isset($_POST)) ? $_POST["NewsText"] : 'ОШИБКА В $_POST';
//var_dump($newsText);

$newOne = new News(); // Создаем пустой объект
$newOne->setNews($newsTitle, $newsText);

/*-------------- Тестовые выводы --------------*/

echo '<br></br>';
$newOne->getNewsTitle($newsTitle);
echo '<br></br>';
$newOne->getNewsText($newsText);
echo '<br></br>';
//var_dump($_POST);
?>