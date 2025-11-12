<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u funktion parameter1</title>
</head>

<body>
    <?php

    function vermerk($name)
    {
        echo '<div style="display: inline-block; border: 1px solid black; padding: 5px;">';
        echo '<span style="border: 1px solid black; margin: 5px;">Dieses Programm wurde geschrieben von ' . $name . '</span>';
        echo '</div>';
        echo '<br>';
    }

    vermerk('Bodo Berg');
    vermerk('Hans Heim');
    ?>
</body>

</html>