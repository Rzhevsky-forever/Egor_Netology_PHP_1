<?php
include_once 'dbManager.php';

function displayUser () {
    $connection = new workWithDb();
    $connection->connection();
    $request = 'select id, login from user';
    $displayUser = $connection->output($request);
    return $displayUser;
}