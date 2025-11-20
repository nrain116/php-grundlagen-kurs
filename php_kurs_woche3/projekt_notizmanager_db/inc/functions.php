<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

function getAllNotes(PDO $pdo): array
{
    $sql = 'SELECT n.id, n.title, n.content, n.created_at, c.name AS category
    FROM notes n
    LEFT JOIN categories c
        ON c.id = n.category_id
        ORDER BY n.id DESC';

    return $pdo->query($sql)->fetchAll();
};
