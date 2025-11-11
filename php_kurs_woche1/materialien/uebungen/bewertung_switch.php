<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>

<body>
    <h1>Bewertung Switch</h1>

    <?php
    for ($punkte = 10; $punkte >= 0; $punkte--) {
        switch ($punkte) {
            case 10:
                $erg = "Sehr gut";
                break;
            case 9:
                $erg = "Gut";
                break;
            case 8:
                $erg = "Befriedigend";
                break;
            case 7:
                $erg = "Ausreichend";
                break;
            default:
                $erg = "Leider zu wenige Punkte erreicht";
        }

        echo "<p>$punkte Punkte ergeben folgende Bewertung: $erg</p>";
    }
    ?>
</body>

</html>