<?php
function getColType($tables, $column, $connection) {
    $tables = $tables;
    $column = $column;
    $request = "SELECT DATA_TYPE 
    FROM INFORMATION_SCHEMA.COLUMNS
    WHERE 
    TABLE_NAME = '$tables' 
    AND 
    COLUMN_NAME = '$column'";
    // Готовим запрос
    $stmtRequest = $connection->prepare($request);
    // Передаем
    $stmtRequest->execute();
    // Получаем ответ
    $getSqlAnswer = $stmtRequest->fetchAll(PDO::FETCH_ASSOC);
    $type = $getSqlAnswer;
    if (isset($type[0]['DATA_TYPE'])) {
        return $type[0]['DATA_TYPE'];
    } else {
        return $massage = 'Такой колонки нет';
    }
}