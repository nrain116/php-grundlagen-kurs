<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    function vermerk($vorname, $nachname, $abteilung)
    {
        $ret = '<div style="display: inline-block; border: 1px solid black; padding: 5px;">';
        $ret .= 'Programmteil von ' . $vorname . ' ' . $nachname . ', Abteilung ' . $abteilung;
        $ret .= '<br>';
        $ret .= 'E-Mail: ' . $vorname . '.' . $nachname . '@' . $abteilung . '.phpdevel.de';
        $ret .= '</div>';
        $ret .= '<br>';

        return $ret;
    }




    ?>

    <?= vermerk('Bodo', 'Berg', 'FE2'); ?>
    <?= vermerk('Hans', 'Heim', 'SU3'); ?>
</body>

</html>