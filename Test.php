<?php 
//include_once 'date.php';
//include_once 'filterAdminDate.php';
//
//class News
//{
//    private $title;
//    private $text;
//    private $news;
//    
//    // Служебные свойства
//    
//    private $newsTitle;
//    private $newsName;
//    private $newsText;
//    
//    function getData ($someNews)
//    {
       /*---------------------------------- Извлекаем данные из $_POST ----------------------------------*/
//            $someNews = $_POST;
//            foreach ($someNews as $key => $value) { 
//                if ($key === 'newsTitle') {
//                    if (!empty($value)) {
//                        $this->newsTitle = $newsTitle = $value; // Создаем переменную названия заголовка
//                        $this->newsName = $newsName = $value; // Переменная отражающая именно имя, а не заголовок понадобится нам в последствии 
//                    } else {
//                        $this->newsTitle = $newsTitle = 'Заголовок вашей новости от ' . $date . ' пустой';
//                        $this->newsName = $newsName = $date;
//                    }
//                }
//                if ($key === 'newsText') {
//                    if (!empty($value)) {
//                        $this->newsText = $newsText = $value; // $value текст новости
//                    } else {
//                        $this->newsText = $newsText = 'Текст вашей новости от ' . $date . ' пустой';
//                    }
//                }
//            } 
//    }
//    
//    function getTest ()
//    {
//        return $arr = [
//            '0' => $this->newsTitle,
//            '1' => $this->newsName,
//            '2' => $this->newsText
//        ];
//    
//    }
//}
//
//$news = new News();
//$news->getData($someNews);
//
//$a = $news->getTest();
////var_dump($a);
//foreach ($a as $v) { echo $v . '<br />'; }

$foo ='12_ssdf';
echo $foo . '<br />';
echo (int)$foo . ' <-- ' . '<br />';
echo $foo . '<br />';
echo (gettype($foo));
