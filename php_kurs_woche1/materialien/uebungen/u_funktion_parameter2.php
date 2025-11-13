<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u funktion parameter 2</title>
</head>

<body>
    <?php

    function quadrat($num)
    {
        $ret =  'Das Quadrat von ' . $num . ' ist ' . pow($num, 2) . '.<br>';
        return $ret;
    }

    ?>

    <?= quadrat(3); ?>
    <?= quadrat(3.2); ?>
    <?= quadrat(-5); ?>
    <?= quadrat(83373); ?>
</body>

</html>