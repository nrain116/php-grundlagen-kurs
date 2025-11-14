<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u funktion einfach

    </title>
</head>

<body>
    <?php

    function vermerk()
    {
        $ret =  '<div style="border: 1px solid black padding: 2px margin: 2px">';
        $ret .=  '<span style="border: 1px solid black ">Dieses Programm wurde geschrieben von Bodo Berg</span>';
        $ret .= '</div>';

        return $ret;
    }
    ?>

    Anfang des Programms <br>
    <?= vermerk() ?>
    Mitte des Programms <br>
    <?= vermerk() ?>
    Ende des Programms
</body>

</html>