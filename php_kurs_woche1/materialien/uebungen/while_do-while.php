<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>While und do-while</title>
</head>

<body>
    <h1>while- und do-while-Schleife</h1>
    <?php

    $i = 20;
    echo "while-Schleife (Startwert: $i)<br>";


    while ($i <= 5) {
        echo $i;
        echo "<br>";
        $i++;
    }

    echo '<hr>';

    $x = 20;

    echo "do-while-Schleife (Startwert: $x)<br>";

    do {
        echo $x;
        echo "<br>";
        $x++;
    } while ($x < 6)

    ?>
</body>

</html>