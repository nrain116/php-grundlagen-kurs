<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u_tabelle</title>
</head>

<body>
    <?php
    echo '<table style="border: 1px solid black">';
    for ($i = 1; $i <= 10; $i++) {
        echo "<tr>";
        for ($y = 1; $y <= 10; $y++) {
            $erg = $i * $y;
            echo '<td style="border: 0.5px solid black">' . $erg . '</td>';
        }
        echo "</tr>";
        echo '<br>';
    }

    echo '</table>';
    ?>

</body>

</html>