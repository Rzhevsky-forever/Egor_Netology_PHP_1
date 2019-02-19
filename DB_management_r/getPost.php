<?php
function getPost() {
    $options = [
        'tables' => FILTER_SANITIZE_STRING,
        'column' => FILTER_SANITIZE_STRING,
        'deletTables' => FILTER_SANITIZE_STRING, // Не используется
        'modify' => FILTER_SANITIZE_STRING, // Не используется
        'ctrl' => FILTER_SANITIZE_STRING
    ];
    $request = filter_input_array(INPUT_POST, $options);
    return $request;
}
