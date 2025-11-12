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
        echo '<div style="border: 1px solid black padding: 2px margin: 2px">';
        echo  '<span style="border: 1px solid black ">Dieses Programm wurde geschrieben von Bodo Berg</span>';
        echo '</div>';
    }



    echo 'Anfang des Programms<br>';
    vermerk();
    echo 'Mitte des Programms<br>';
    vermerk();
    echo 'Ende des Programms';

    ?>
</body>

</html>