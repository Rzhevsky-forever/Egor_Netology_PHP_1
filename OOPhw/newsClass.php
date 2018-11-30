<?php
// Класс конструкторе
if (!empty($_POST)) {
    var_dump($_POST);    echo '<br />';
    $someNews = $_POST;
    foreach ($someNews as $key => $value) {
        echo 'foreach' . '<br />';
        if ($key === 'newsTitle') {
            $newsTitle = $value;
            echo '1 if' . '<br />';
        }
        if ($key === 'newsText') {
            echo '2 if' . '<br />';
            $newsText = $value;
            /*
            $fileText = 'fileText.txt';
            $fileTextStream = fopen($fileText, 'w');
            fwrite($fileTextStream, $value);
            fclose($fileTextStream);
             * 
             */
        }
    }
}
//var_dump($newsTitle);
//var_dump($newsText);
class  News
{
    private $newsTitle = 'Значение по умолчанию';
    private $newsText = 'Значение по умолчанию';
    
    function __construct($newsTitle, $newsText) 
    {
        $this->newsTitle = $newsTitle;
        $this->newsText =$newsText;
    }
    
    function getNews()
    {
        return $getNews =[
            'newsTitle' => $this->newsTitle,
            'newsText' => $this->newsText,
        ];
    }
}

$news = new News 
    (
        '$newsTitle',
        '$newsText'
    );

    header('index.php');

