<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fehlerbehandlung</title>
    <link rel="stylesheet" href="../../style/style.css">

</head>

<body>
    <header>
        <h1>Fehlerbehandlung</h1>
    </header>
    <main class="container">
        <?php
        $x = 42;
        /* Variable unbekannt */
        try {
            if (!isset($x)) {
                /* Anweisung, wenn die Variable nicht existiert */
                throw new Exception('Variable unbekannt');
            }
            echo "<p>Variable : $x</p>";
        } catch (Exception $error) {
            echo '<p class="bad"><b>Uuuups: </b>';
            echo $error->getMessage() . '<br>';
            echo 'Weitere mögliche Meldungen</p>';

            echo '<pre>', var_dump($error), '</pre>';
        } finally {
            echo '<p>Ausgabe von Anweisungen, egal ob die Ausnahme geworfen wurde oder nicht.</p>';
        }

        /* Division durch 0 */
        $x = 42;
        $y = 0;
        try {
            if ($y === 0) {
                throw new Exception("<p class=\"bad\">Division von $x : $y nicht erlaubt.</p>");
            }
            $z = $x / $y;
            echo "Division: $x : $y = $z<br>";
        } catch (Exception $error) {
            echo $error->getMessage() . '<br>';
        }

        /*  Zugriff auf unbekannt Funktion */

        function testFn()
        {
            echo "<p>testFn</p>";
        }

        try {
            if (!function_exists('testFn')) {
                throw new Exception("<p class=\"bad\">Funktion \"testFn\" nicht bekannt<br>");
            }
            testFn();
        } catch (Exception $error) {
            echo $error->getMessage() . '</p>';
        }

        ?>
    </main>
</body>

</html>