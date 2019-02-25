<?php
// Функция изменения типа поля
function modify($tables, $column, $typeToModify, $connection) {
    $tables = $tables;
    $column = $column;
    $typeToModify = $typeToModify;
    $request = "ALTER TABLE $tables MODIFY $column $typeToModify";
    // Готовим запрос
    $stmtRequest = $connection->prepare($request);
    // Передаем
    $stmtRequest->execute();
}