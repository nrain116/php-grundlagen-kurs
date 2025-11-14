<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u funktion einbinden</title>
</head>

<body>
    <?php

    function mittelwert(...$args)
    {
        foreach ($args as $arg) {
            $sum += $arg;
        }
        $num_params = func_num_args();
        $mid = $sum / $num_params;
        return $mid;
    }

    $max = 0;
    function maximum(...$args)
    {
        foreach ($args as $arg) {
            if ($max < $arg) $max = $arg;
        }
        return $max;
    }

    ?>

    <p>Mittelwert: <?= mittelwert(4, 2, 3, 5, 6, 8, 9) ?></p>

    <p>Maximum: <?= maximum(12, 32, 324, 132, 1010) ?></p>
</body>

</html>