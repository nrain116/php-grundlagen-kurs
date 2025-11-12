<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u funktion mehrere 1</title>
</head>

<body>
    <?php

    function mittel($num1, $num2, $num3)
    {
        $mittelwert = ($num1 + $num2 + $num3) / 3;
        echo "Der Mittelwert von $num1, $num2 und $num3 ist $mittelwert <br>";
    }

    mittel(4, 7, 6);
    mittel(44, 67.5, 1);
    mittel(-5, 0, -13);
    mittel(0.001, 0.0081, 0.0032);
    mittel(5, 8, 2);
    ?>
</body>

</html>