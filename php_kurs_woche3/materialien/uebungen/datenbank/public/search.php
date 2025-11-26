<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);
// Include the header to start the session and load dependencies
include_once __DIR__ . '/header.php';

require_once __DIR__ . '/../inc/db-connect.php';
require_once __DIR__ . '/../inc/functions.php';

$artnummer = trim($_POST['artnummer'] ?? '');
$hersteller = trim($_POST['hersteller'] ?? '');
$typ = trim($_POST['typ'] ?? '');
$gb = (int)($_POST['gb'] ?? 0);
$preis = (float)($_POST['preis'] ?? 0.0);
$prod = trim($_POST['prod'] ?? '');

if ($artnummer || $hersteller || $typ || $gb || $preis || $prod) {
    $hardware = searchHardware($pdo, $artnummer, $hersteller, $typ, $gb, $preis, $prod);
} else {
    $hardware = fetchNotes($pdo);
}




// Redirect 
header('Location: index.php');
exit;
