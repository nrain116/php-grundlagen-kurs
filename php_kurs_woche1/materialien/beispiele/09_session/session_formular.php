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
    <title>Formular zur Eingabe von Daten</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>

<body>
    <header>
        <h1>Session: Angaben zur Person</h1>
    </header>
    <main class="container">
        <form action="session_auswertung.php" method="post">
            <label>Vorname:
                <input type="text" name="fname">
            </label>
            <label>Nachname:
                <input type="text" name="lname">
            </label>
            <label>Wohnort:
                <input type="text" name="city">
            </label>
            <button type="submit">Senden</button>
        </form>
    </main>
</body>

</html>