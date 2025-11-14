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
    <title>Schokolade - Bestellformular</title>
    <link rel="stylesheet" href="../materialien/style/style.css">
</head>

<body>
    <header>
        <h1>Bestellformular für Schokolade</h1>
    </header>
    <main class="container">
        <p><a href="form_pralinen.php">Pralinen</a></p>

        <p>Tragen Sie bitte die gewünschte Menge Schokolade ein:</p>

        <form action="warenkorb.php" method="post">
            <table>
                <tr>
                    <th>Art.-Nr.</th>
                    <th>Artikel</th>
                    <th>Menge</th>
                    <th>Einheit</th>
                </tr>
                <?php

                /**
                 * Schleife 
                 * - der Artikelnr.
                 * - der Artikelbezeichnung usw.
                 **/
                foreach ($array_schoko as $artnr => $artikel):
                ?>
                    <tr>
                        <td><?= $artnr ?></td>
                        <td><?= $artikel ?></td>
                        <td><input type="number" name="<?= $artnr ?>" value="<?= $_SESSION[$artnr] ?? 0 ?>" size="5"></td>
                        <td>Tafel (100g)</td>
                    </tr>

                <?php endforeach; ?>
                <td>
                <td colspan="4">
                    <button type="submit" style="margin-bottom: 1rem">In den Warenkorb</button>
                    <button type="reset" style="background: #dc2626">Abbrechen</button>
                </td>
                </td>
            </table>
        </form>
    </main>
</body>

</html>