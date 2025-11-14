<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u eingabe php</title>
</head>

<body>
    <?php

    $output = '';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $firstName = htmlspecialchars($_POST["firstName"]);
        $lastName  = htmlspecialchars($_POST["lastName"]);
        $street    = htmlspecialchars($_POST["street"]);
        $plz       = htmlspecialchars($_POST["plz"]);
        $city      = htmlspecialchars($_POST["city"]);

        $output = 'Ihr Adresse lautet: <br>';
        $output .= "$firstName $lastName <br>";
        $output .= "$street <br>";
        $output .= "$plz $city <br>";
    } else {
        $output = "<p>Keine Daten empfangen.</p>";
    }
    ?>
    <div><?= $output ?></div>
</body>

</html>