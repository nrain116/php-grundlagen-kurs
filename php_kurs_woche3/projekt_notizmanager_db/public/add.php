<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);
// Include the header to start the session and load dependencies
include_once __DIR__ . '/header.php';

require_once __DIR__ . '/../inc/db-connect.php';
require_once __DIR__ . '/../inc/functions.php';

$user_id = getUserId($pdo);

if ($user_id === null) {
    // user not logged in, handle error
    die('You must be logged in to add a note.');
}

$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');
$cat = $_POST['category_id'] ?? '';
$catId = ($cat === '' ? null : (int)$cat);

if ($title !== '' && $content !== '') {
    addNote($pdo, $title, $content, $user_id, $catId);
}




// Redirect 
header('Location: index.php');
exit;
