<?php
// Функция удаления поля таблицы
function deletTables ($tables, $column, $connection) {
    $tables = $tables;
    $column = $column;
    $request = "ALTER TABLE $tables DROP COLUMN $column";
    // Готовим запрос
    $stmtRequest = $connection->prepare($request);
    // Передаем
    $stmtRequest->execute();
} ?>