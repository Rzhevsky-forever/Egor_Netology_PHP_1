<?php
// Переменные которые хронят данные соединения
$driver = 'mysql';
$host = 'localhost';
$dbNname ='evolchanov';
$charset ='utf8';
$login = 'evolchanov';
$pass = 'neto1822';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

// Соединение с базой данных
$connection = new PDO("$driver:host=$host; dbname=$dbNname; charset=$charset", "$login", "$pass", $options);