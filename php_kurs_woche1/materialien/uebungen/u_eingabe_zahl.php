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

        $number = htmlspecialchars($_POST["number"]);
        $pow = pow($number, 2);
        $output = "Das Quadrat von $number ist $pow";
    } else {
        $output = "Keine Daten empfangen.";
    }
    ?>

    <?php if (trim($output)):  ?>
        <p><?= $output ?></p>
    <?php endif; ?>
</body>

</html>