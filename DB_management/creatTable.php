<?php
// Функция создания таблицы. В тексте задания упоминается создание таблицы
function CREATE_TABLE() {
    // Переменная для запроса
    $request = "CREATE TABLE `test__3` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NULL,
    `estimation`float NOT NULL,
    `budget` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    // Готовим запрос
    $stmtRequest = $connection->prepare($request);
    // Передаем
    $stmtRequest->execute();
} ?>