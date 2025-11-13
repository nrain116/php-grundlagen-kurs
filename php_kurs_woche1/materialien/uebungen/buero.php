<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buero-Aufgabe</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>

<body>

    <h1>Mit Variablen, Operatoren und Konstanten arbeiten</h1>
    <?php

    $bezeichnung_tisch = 'Schreibtisch';
    $bezeichnung_stuhl = 'Bürostuhl';
    $bezeichnung_lampe = 'Lampe';
    $bezeichnung_pctisch = 'Computertisch';

    $preis_tisch = 1999.00;
    $preis_stuhl = 589.00;
    $preis_lampe = 29.00;
    $preis_pctisch = 999.00;

    $gesamtNetto = $preis_lampe + $preis_pctisch + $preis_stuhl + $preis_tisch;
    $gesamtBrutto = ($preis_lampe + $preis_pctisch + $preis_stuhl + $preis_tisch) * 1.19;

    $mwst = 0.19;
    $bruttoLampe = $preis_lampe * (1 + $mwst);
    $bruttoPc = $preis_pctisch * (1 + $mwst);
    $bruttoStuhl = $preis_stuhl * (1 + $mwst);
    $bruttoTisch = $preis_tisch * (1 + $mwst);


    echo "Netto-Gesamtpreis der eingekauften Artikel: $gesamtNetto Euro.<br>";
    echo "Brutto-Gesamtpreis der eingekauften Artikel: $gesamtBrutto Euro.<br>";

    echo "<hr>";

    echo "Brutto-Preis Schreibtisch: $bruttoTisch Euro<br>";
    echo "Brutto-Preis Bürostuhl: $bruttoStuhl Euro<br>";
    echo "Brutto-Preis Schreibtischlampe: $bruttoLampe Euro<br>";
    echo "Brutto-Preis Computertisch: $bruttoPc Euro<br>";

    ?>
</body>

</html>