<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u funktion rückgabewert</title>
</head>

<body>
    <?php

    function bigger($a, $b)
    {
        if ($a < $b) {
            $max = $b;
        } else {
            $max = $a;
        }
        return $max;
    }

    ?>

    <p>Maximum: <?= bigger(3, 4); ?></p>
    <p>Maximum: <?= bigger(32, 24); ?></p>
    <p>Maximum: <?= bigger(33, 43); ?></p>
</body>

</html>