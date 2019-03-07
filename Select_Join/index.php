<?php
// Стартуем сессию
session_start();
// Подкючаем файлы
include_once 'router.php';
include_once 'newTask.php';
?>

<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Список задач</title>
    </head>
    <body>
        <?php if(!isset($_SESSION['role'])) { ?>
            <h1> Выполните вход или регистрацию </h1>
                <div>
                    <a href="Registration.php">Регистрация</a>
                </div>
                    <br>
                <div>
                    <a href="Authentication.php">Авторизация</a>
                </div>
        <?php }
            ?>
            <br>
        <?php if (isset( $_SESSION['statusRegistration'])) {
            if ($_SESSION['statusRegistration'] === 'userAlreadyExists') { ?>
                <h4> Такой пользователь уже существует </h4>
            <?php } elseif ($_SESSION['statusRegistration'] === 'newUser') { ?>
                <h4> Поздравляем вы зарегистрировались </h4>
            <?php }
        }   
        if (isset($_SESSION['role'])) {    
            if ($_SESSION['role'] === 'notUser') { ?>
                <h1> Выполните вход или регистрацию </h1>
                    <div>
                        <a href="Registration.php">Регистрация</a>
                    </div>
                        <br>
                    <div>
                        <a href="Authentication.php">Авторизация</a>
                    </div>
            <?php }
            elseif ($_SESSION['role'] === 'user') { ?>
                <div>
                    <a href="Tasks.php">Задачи</a>
                </div>
                    <br>
                <div>
                    <a href="Exit.php">Выход</a>
                </div>
                    <br>
            <?php }
        } ?>
    </body>
</html>

<?php
// Тесты
//var_dump($_SESSION); // Testing
?>