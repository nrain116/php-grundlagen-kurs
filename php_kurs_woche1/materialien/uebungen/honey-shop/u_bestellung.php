<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);
session_start();
include 'u_form.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellübersicht</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>

<body>
    <header>
        <h1>Honigbestellung</h1>
    </header>

    <main class="container">
        <p>Sie haben folgende Menge bestellt:</p>

        <?php
        if (!empty($_POST)) {

            foreach ($_POST as $honey => $menge) {

                if (!is_numeric($menge)) {
                    continue;
                }

                $menge = (int)$menge;

                if ($menge > 0) {
                    $_SESSION[$honey] = $menge;
                } else {
                    unset($_SESSION[$honey]);
                }
            }
        } else {
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }
        }
        ?>

        <table>
            <tr>
                <th>Honig</th>
                <th>Menge</th>
            </tr>
            <?php foreach ($_SESSION as $honey => $menge): ?>
                <tr>
                    <td><?= htmlspecialchars($honey) ?></td>
                    <td><?= $menge ?> <?= ($menge == 1) ? ' Glas' : ' Gläser' ?></td>

                </tr>
            <?php endforeach; ?>
        </table>

        <p>Die Session-ID lautet: <?= session_id(); ?></p>

        <p><a href="u_abschluss.php">Weiter zur Eingabe persönlicher Daten</a> und dem Abschluss der Bestellung</p>

    </main>
</body>

</html>