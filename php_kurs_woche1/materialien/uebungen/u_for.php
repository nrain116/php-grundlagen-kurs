<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u For</title>
</head>

<body>
    <?php

    for ($i = 13; $i <= 29; $i += 4) {
        echo "$i ";
    }

    echo '<br>';

    for ($i = 2; $i >= -1; $i -= 0.5) {
        echo "$i ";
    }

    echo '<br>';

    for ($i = 2000; $i <= 6000; $i += 1000) {
        echo "$i ";
    }

    echo '<br>';

    for ($i = 5; $i <= 13; $i += 2) {
        echo "Z$i ";
    }

    echo '<br>';

    for ($i = 1; $i <= 3; $i++) {
        echo "a b$i ";
    }

    echo '<br>';
    for ($i = 2; $i <= 3; $i++) {
        echo "c$i ";
    }

    for ($i = 1; $i <= 2; $i++) {
        for ($y = 2; $y <= 3; $y++) {
            echo "c$i$y ";
        }
    }

    echo '<br>';

    for ($i = 13; $i <= 45; $i += 4) {
        if ($i == 29) {
            continue;
        }
        echo "$i ";
    }
    ?>


</body>

</html>