<?php
function getColName($tables, $column, $connection) {
    $tables = $tables;
    $column = $column;
    $request = "SELECT COLUMN_NAME 
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
    $colName = $getSqlAnswer;
    if (isset($colName[0]['COLUMN_NAME'])) {
        return $colName[0]['COLUMN_NAME'];
    } else {
        return $massage = 'Имя не изветсно';
    }
}

