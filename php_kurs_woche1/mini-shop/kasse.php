<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);
session_start();
include 'artikel.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasse</title>
    <link rel="stylesheet" href="../materialien/style/style.css">
</head>

<body>
    <header>
        <h1>Bestellung abschließen</h1>
    </header>
    <main class="container">

        <?php

        /* Prüfe, ob das Formular bereits abgesendet wurde */
        if (isset($_POST['abschliessen'])):
            /* wenn ja, Daten speichern */
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $city = $_POST['city'];

            /* und die tabellarische Übersicht inkl. Adressdateb ausgeben */

        ?>

            <p>Sie haben folgende Bestellung übermittelt:</p>

            <!-- Adressdaten ausgeben -->
            <p><?= $fname ?> <?= $lname ?> aus <?= $city ?></p>

            <!-- bestellte Artikel -->
            <table>
                <tr>
                    <th>Art.-Nr.</th>
                    <th>Artikel</th>
                    <th>Menge</th>

                    <?php
                    /* Bestellung speichern in eine CSV-Datei */
                    /* Spaltenüberschrift der CSV-Datei */
                    $bestellung = "Art.-Nr.;Artikel;Menge\r\n";

                    /* Artikel eintragen */
                    foreach ($_SESSION as $artnr => $menge) {
                        if (str_starts_with($artnr, 's')) {
                    ?>
                <tr>
                    <td><?= $artnr ?></td>
                    <td><?= $array_schoko[$artnr] ?></td>
                    <td><?= $menge ?></td>
                </tr>
            <?php
                            $bestellung .= "$artnr;" . $array_schoko[$artnr] . ";$menge\r\n";
                        }

                        if (str_starts_with($artnr, 'p')) {
            ?>
                <tr>
                    <td><?= $artnr ?></td>
                    <td><?= $array_pralinen[$artnr] ?></td>
                    <td><?= $menge ?></td>
                </tr>
        <?php
                            $bestellung .= "$artnr;" . $array_pralinen[$artnr] . ";$menge\r\n";
                        }
                    }
                    $bestellung .= "\r\nbestellt von \r\n$fname;$lname;$city\r\n\r\n";
        ?>
        </tr>
            </table>

            <p>Vielen Dank für Ihren Einkauf</p>

        <?php
            /* Bestellung speichern */
            file_put_contents('bestellung.csv', $bestellung, FILE_APPEND);

            /* Session leeren und löschen */
            $_SESSION = array();
            session_destroy();
        else:
        ?>

            <p>Bitte füllen SIe die nachfolgenden Eingabefelder aus</p>
            <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post">
                <p>Vorname: <input type="text" name="fname"></p>
                <p>Nachname: <input type="text" name="lname"></p>
                <p>Wohnort: <input type="text" name="city"></p>
                <p><button type="submit" name="abschliessen">Absenden und Bestellung abschließen</button></p>
            </form>

        <?php endif; ?>
        <ul>
            <li><a href="form_schoko.php">Schokoladen bestellen</a></li>
            <li><a href="forn_pralinen.php">Pralinen bestellen</a></li>
            <li><a href="warenkorb.php">Warenkorb</a></li>
        </ul>
    </main>
</body>

</html>