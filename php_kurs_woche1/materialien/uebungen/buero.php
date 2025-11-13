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

    $output = '';
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


    $output = "Netto-Gesamtpreis der eingekauften Artikel: $gesamtNetto Euro.<br>";
    $output .= "Brutto-Gesamtpreis der eingekauften Artikel: $gesamtBrutto Euro.<br>";

    $output .=  "<hr>";

    $output .=  "Brutto-Preis Schreibtisch: $bruttoTisch Euro<br>";
    $output .=  "Brutto-Preis Bürostuhl: $bruttoStuhl Euro<br>";
    $output .=  "Brutto-Preis Schreibtischlampe: $bruttoLampe Euro<br>";
    $output .=  "Brutto-Preis Computertisch: $bruttoPc Euro<br>";

    ?>

    <?= $output ?>
</body>

</html>