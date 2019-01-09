<?php
$definition = [
    'newsTitle' => FILTER_SANITIZE_STRING,
    'newsText' => FILTER_SANITIZE_STRING,
    'comment' => FILTER_SANITIZE_STRING
];
$someNews = filter_input_array(INPUT_POST, $definition['newsTitle'], $definition['newsText']);
$comments = filter_input_array(INPUT_POST, $definition['comment']);



