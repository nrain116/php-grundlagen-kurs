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
    <title>Daten in das Session-Array speichern</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>

<body>
    <header>
        <h1>Daten der Session speichern</h1>
    </header>
    <main class="container">
        <p>Sie haben folgendes eingetragen:
            <br>Vorname: <?= $_POST['fname'] ?>
            <br>Nachname: <?= $_POST['lname'] ?>
            <br>Wohnort: <?= $_POST['city'] ?>
        </p>

        <?php

        /**
         * Das superglobale Array $_SESSION wird mit den WErten des Formulars und dem aktuellen Zeitstempelgefüllt
         **/
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['zeit'] = time();
        ?>

        <p>Folgende Daten sind nun in der Session gespeichert:</p>

        <?php echo '<pre>', print_r($_SESSION, true), '</pre>'; ?>
        <p>Weiter zu <a href="session_auslesen.php">folgenden Seite</a></p>


    </main>
</body>

</html>