<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once './adminNewsScript.php';
//include_once './adminNews.php';
?>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
        <?php
            $newOne->getNewsTitle($newsTitle);
        ?>
        </div>
        <div>
        <?php
            $newOne->getNewsText($newsText);
        ?>
        </div>
    </body>
</html>
