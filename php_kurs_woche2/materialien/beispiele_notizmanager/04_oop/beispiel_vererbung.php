<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once __DIR__ . '/class/Pkw.php';
require_once __DIR__ . '/class/Hund.php';

$opel = new Pkw('blau', 'Opel', 'Corsa', 'Benzin', 125);
$fluffy = new Hund('Fluffy', 'Golden Retriever');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vererbung und Schnittstellen</title>
    <link rel="stylesheet" href="../../style/style.css">

</head>

<body>
    <header>
        <h1>Vererbung und Schnittstellen</h1>
    </header>
    <main class="container">
        <h2>Vererbung</h2>
        <article class="post">
            <p><?= $opel ?></p>
            <?php $opel->setSpeed(80); ?>
            <p><?= $opel ?></p>
        </article>

        <h2>Schnittstellen (Interfaces)</h2>
        <article class="post">
            <p><?= $fluffy ?></p>
        </article>
    </main>
</body>

</html>