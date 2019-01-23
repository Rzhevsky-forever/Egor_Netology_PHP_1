<?php
    session_start(); // Запускаем сессию
    $_SESSION['role'] = 'none';
//  $_SESSION['cont_admin_Pass_inter']; // Testing
    include_once 'core/checkUser.php';
        $userStatus = ''; // Определяем переменную в которой будем хранить значение статуса пользователя 
        // Проверяем статус пользователя
        $userStatus = getUser(); // Передаем значение из функции авторизации
        //
        if ($userStatus === 'not_admin?') {
            echo '<br> Не верный пароль! Попробуйте еще раз <br>';
        }
        // Если пароль от админки введен не верно 3 раза
        if ($_SESSION['role'] === 'not_admin') {
            header('Location: core/captcha_page.php');
//            print_r($_SESSION['role']); // Testing
        }
        else { ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Авторизация</title>
        <link rel="stylesheet" href="CSS/style.css" type="text/css"/>
    </head>
    <body>
        <p>
            Введите логин и пароль
        </p>
        <form method="POST" action="index.php">
            <p>Логин :</p>
                <input type="text" name="userLogin">
            <p>Пароль :</p>
                <input type="text" name="userPass">
            <div class="radio_buttom buttom_submit">
                <input type="submit">
            </div>    
        </form>
        <?php 
        // Если пользователь админ :
        if ($userStatus === 'admin') {
            echo 'определился админ <br>';
//            var_dump($_SESSION); // Testing ?>
            <a href="admin.php">Перейти к административной странице</a>
            <br>
            <a href="list.php">Перейти к списку тестов</a>
        <?php }
        // Если пользователь user :
        else if ($userStatus === 'user') {
//            var_dump($_SESSION); // Testing
            echo '<br> определился пользователь <br>'; ?>
            <a href="list.php">Перейти к списку тестов</a>
        <?php }
        // Если пользователь гость :
        elseif ($userStatus === 'host') {
            echo 'определился "гость"<br>'; ?>
            <a href="list.php">Перейти к списку тестов</a>
        <?php }
        // Если пользователь не представился (чюжой) :
        elseif ($userStatus === 'alen') {
//            echo 'определился "незнакомый пользователь"<br>'; // Testing ?>
            <p> Представтесь пожалуйста или  </p>
            <a href="registration.php">Зарегистрироваться</a>
        <?php }
        } ?>
    </body>
</html>
