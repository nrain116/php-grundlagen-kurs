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

        $number = htmlspecialchars($_POST["number"]);
        $pow = pow($number, 2);
        echo "<p>Das Quadrat von $number ist $pow</p>";
    } else {
        echo "<p>Keine Daten empfangen.</p>";
    }
    ?>
</body>

</html>