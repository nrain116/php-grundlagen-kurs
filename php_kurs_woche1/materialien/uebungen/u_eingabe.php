<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u eingabe php</title>
</head>

<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $firstName = htmlspecialchars($_POST["firstName"]);
        $lastName  = htmlspecialchars($_POST["lastName"]);
        $street    = htmlspecialchars($_POST["street"]);
        $plz       = htmlspecialchars($_POST["plz"]);
        $city      = htmlspecialchars($_POST["city"]);

        echo "<p>Ihr Andresse lautet:</p>";
        echo "<p>$firstName $lastName</p>";
        echo "<p>$street</p>";
        echo "<p>$plz $city</p>";
    } else {
        echo "<p>Keine Daten empfangen.</p>";
    }
    ?>
</body>

</html>