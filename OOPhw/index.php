<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Тестовый новостной блог</title>
        <!-- Wrapper styles -->
        <link type="text/css" rel="stylesheet" href="wrapper.css">
        <!-- Castom styles -->
        <link type="text/css" rel="stylesheet" href="castom.css" >
    </head>
    <body>
    <?php
        include_once 'newsClass.php';
        $getNews = $news->getNews();
//        var_dump($getNews); // ----------------------------- Test print
    ?>
        <div class="wrapper">
            <div class="newsTitle titleFeld">
                <?php echo $getNews['newsTitle']; ?>
            </div>
            <div class="newsText textFeld">
                <?php echo $getNews['newsText'];?>
            </div>
        </div>
    <?php 
    /*
        $test = $test -> getInfo();
        foreach ($test as $value) {
            echo $value . '<br />';
        }
     * 
     */
    ?>
    </body>
</html>
