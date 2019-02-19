<?php
// Стартуем сессию
session_start();
// Подкючаем файлы
include_once 'router.php';
include_once 'newTask.php';
// Экземпляры
    // Пока нет не одного
?>

<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Список задач</title>
    </head>
    <body>
        <div>
            <a href="Registration.php">Регистрация</a>
        </div>
            <br>
        <div>
            <a href="Authentication.php">Авторизация</a>
        </div>
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
echo '<hr />';
echo '<pre>';
print '$_POST : <br>';
//var_dump($_POST);
print '$_SESSION : <br>';
 var_dump($_SESSION);
echo '</pre>';
echo '<hr />';
// Структура :

//  Авторизация / Аутентификация
        // Пользователь :
            
            // Авторизован ?
            
                // Да
                    // Показываем контент (одна верстка)
                        // Запрос :
                            // Добавление нового вашего дела (описание, дата)
                                // Верстка
                                    // Получить данные
                                    // Подготовить запрос
                                    // Передать
                                    // Проверить что запрос был передать / не передан (ошибка)
                                    // Вывести сообщение
                            // Вывод списка ваших дел (отсортированных по дате)
                                // Верстка
                                    // Получить запрос
                                    // Подготовить запрос
                                    // Передать  
                                    // Вернуть ответ пользователю
                            //Удаление "Задачи"
                                // Верстка
                                    // Получить запрос
                                    // Подготовить запрос
                                    // Передать  
                                    // Проверить что "Задача" была удалена
                                    // Вывести сообщение
                            // Отмечать дела как выполненные/невыполненные
                                // Верстка
                                    // Получить запрос
                                    // Подготовить запрос
                                    // Передать  
                                    // Проверить что "Задача" была отмечена (изменения в базу внесены)
                                    // Вывести сообщение
                            // Делегировать(передавать) дела
                                // Верстка
                                    // Получить запрос
                                    // Подготовить запрос
                                    // Передать
                                    // Проверить, что "Задача" была передана (изменения в базу внесены)
                                    // Вывести сообщение
                            // Показать делегированные дела с именем автора
                                // Верстка
                                    // Получить запрос
                                    // Подготовить запрос
                                    // Передать
                                    // Вернуть ответ пользователю
                            // Вывести количество дел
                                // Верстка
                                    // Получить запрос
                                    // Подготовить запрос
                                    // Передать
                                    // Вернуть ответ пользователю
                            // Выход
                                // Верстка
                                    // Получить запрос
                                    // Разорвать сессию
            // Нет
                // Просим авторизоваться / зарегистрироваться (другая верстка)
?>