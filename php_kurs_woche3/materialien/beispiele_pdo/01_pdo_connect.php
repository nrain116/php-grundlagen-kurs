<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);
include_once '../config/config.php';

try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=notizmanager;charset=utf8mb4',
        'user',
        '123',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]
    );
    echo 'Verbindung erfolgreich';
} catch (PDOException $e) {
    echo 'DB-Fehler: ' . htmlspecialchars($e->getMessage());
}
