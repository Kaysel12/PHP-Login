<?php

$host = 'localhost';
$dbName = 'php_login_database';
$dbUsuario = 'root';
$dbPassword = '';

try {
    $connect = new PDO("mysql:host=$host;dbname=$dbName", "$dbUsuario", "$dbPassword");

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

?>