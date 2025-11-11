<?php

error_reporting(E_ALL);
ini_set("display_error", true);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variablen Forsetzung</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>

<body>
    <?php

    $einString = 'Ich bin eine Variable'; // Datentyp: String

    echo '<p>Der Inhalt der Variable ist: $einString.</p>';

    echo '<p>Der Inhalt der Viable ist: ' . $einString . '.</p>';

    echo "<p>Der Inhalt aus dem Double-Quote ist: $einString.</p>\r\n";

    echo '<p>Eine mit Komma getrennt Ausgabe mit mehreren Zeichenketten: "', $einString, '" ist aus einer Variable.', '</p>';

    $preisZiege = '0.5 Kamele';
    $menge = 5;
    $prod = $preisZiege * $menge;

    echo "<p>Eine Ziege kostet $preisZiege.</p>";
    echo "<p>Für $menge Ziegen bekomment man $prod Kamele.</p>";

    /* === Konstanten
        ============================================================================================= */

    // Klassische Variante
    define('SEK_TAG', 24 * 60 * 60);

    // neue Variante seit PHP 5.5
    const MIN_TAG = 24 * 60;

    echo '<p>Ein Tag hat ', MIN_TAG, ' Minuten bzw. ', SEK_TAG, ' Sekunden.</p>';

    /* === Verketten und Rechnen
    ============================================================================================= */

    $zahl = 5;
    $nochEineZahl = 37;

    echo "<p>Die Summer der Zahlen $zahl und $nochEineZahl ergibt: " . $zahl + $nochEineZahl . " </p>";
    ?>
</body>

</html>