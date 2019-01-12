<?php
session_start();
    $captcha = filter_input(INPUT_POST, 'captcha');
//    echo '<br> captcha : <br>'; // Testing
//    var_dump($captcha); // Testing
//    echo '<br>'; // Testing
//    echo '<br>'; // Testing
//    var_dump($captcha); // Testing
//    echo '<br>'; // Testing
//    echo 'SESSION[captcha] : <br>'; // Testing
//    var_dump($_SESSION['captcha']); // Testing
//    echo '<br>'; // Testing
    if (isset($_SESSION['captcha'])) { 
        if (strval($_SESSION['captcha']) === $captcha) {
            header('Location: ../index.php');
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Авторизация</title>
        <link rel="stylesheet" href="CSS/style.css" type="text/css"/>
    </head>
    <body>
        <p>Введите код с картинки и попробуйте снова</p>
        <img src="../resources/image/captcha.php">
        <form method="POST" action="captcha_page.php">
                <p> Код с картинки :</p>
                    <input type="text" name="captcha">
                <div class="radio_buttom buttom_submit">
                    <input type="submit">
                </div>    
        </form>
    </body>
</html>