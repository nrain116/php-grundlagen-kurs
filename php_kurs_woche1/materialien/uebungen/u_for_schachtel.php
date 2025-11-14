<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=php+, initial-scale=1.0">
    <title>u for Schachtel</title>
</head>

<body>
    <?php

    for ($i = 1; $i <= 10; $i++) {
        for ($y = 1; $y <= 10; $y++) {
            $erg = $i * $y;
            echo "$erg ";
        }
        echo '<br>';
    }

    ?>
</body>

</html>