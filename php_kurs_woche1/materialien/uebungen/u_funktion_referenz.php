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
    <title>u funktion referenz</title>
</head>

<body>
    <?php

    function rechne(&$a, &$b, &$summe, &$produkt)
    {
        $summe = $a + $b;
        $produkt = $a * $b;
    }

    $num1 = 7;
    $num2 = 5;
    $summe = 0;
    $produkt = 0;

    rechne($num1, $num2, $summe, $produkt);

    ?>

    <p>Die Summe von <?= $num1 . ' und ' . $num2 . ' ist ' . $summe ?></p>
    <p>Das Produkt von <?= $num1 . ' und ' . $num2 . ' ist ' . $produkt ?></p>

</body>

</html>