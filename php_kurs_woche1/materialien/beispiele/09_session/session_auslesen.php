<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auslesen der Session-Daten</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>

<body>
    <header>
        <h1>Auslesen der Session-Daten</h1>
    </header>
    <main class="container">
        <p>Folgende Daten wurden gespeichert:</p>

        <p>
            <?php
            foreach ($_SESSION as $key => $val) {
                echo "$key: $val <br>";
            }
            ?>
        </p>

        <p>Weiter zur <a href="session_destroy.php">folgenden Seite</a>.</p>
    </main>
</body>

</html>