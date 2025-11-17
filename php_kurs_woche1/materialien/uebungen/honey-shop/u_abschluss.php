<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasse</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>

<body>
    <header>
        <h1>Honigbestellung - Abschluss</h1>
    </header>
    <?php

    if (empty($_POST)): ?>
        <p>Bitte geben Sie noch Ihre Kontaktdaten ein:</p>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <label>Vorname:
                <input type="text" name="fname">
            </label>
            <label>Nachname:
                <input type="text" name="lname">
            </label>
            <label>Wohnort:
                <input type="text" name="city">
            </label>
            <label>Mailadresse:
                <input type="text" name="email">
            </label>
            <button type="submit">Senden</button>
        </form>
    <?php
    else:
    ?>
        <p>Dies sind die in der Session gesammelten Daten:</p>

        <?php
        foreach ($_SESSION as $honey => $menge):
        ?>
            <p><?= $honey ?> : <?= $menge ?></p>
        <?php endforeach; ?>
        <p>Vorname: <?= $_POST['fname'] ?></p>
        <p>Nachname: <?= $_POST['lname'] ?></p>
        <p>Wohnort: <?= $_POST['city'] ?></p>
        <p>Mailadresse: <?= $_POST['email'] ?></p>
        <p>Damit ist die Session beendet. <a href="u_formular.php">Klicken Sie hier</a>, um eine neue Session zu beginnen.</p>

    <?php endif; ?>
</body>

</html>