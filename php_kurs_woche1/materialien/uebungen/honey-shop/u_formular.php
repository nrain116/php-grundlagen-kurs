<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);
session_start();
session_unset();
session_destroy();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000, // past time to delete cookie
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

session_start();

include 'u_form.inc.php';

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valid = false;

    foreach ($array_honey as $honey) {
        $nameAttr = preg_replace('/[^a-zA-Z0-9_]/', '_', $honey);
        $qty = (int)($_POST[$nameAttr] ?? 0);
        if ($qty >= 1) {
            $valid = true;
            break;
        }
    }

    if ($valid) {
        foreach ($array_honey as $honey) {
            $nameAttr = preg_replace('/[^a-zA-Z0-9_]/', '_', $honey);
            $_SESSION[$honey] = (int)($_POST[$nameAttr] ?? 0);
        }
        header('Location: u_bestellung.php');
        exit;
    } else {
        $errorMessage = 'Bitte geben Sie mindestens 1 Menge für einen Honig ein.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellformular</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>

<body>
    <header>
        <h1>Honigbestellung</h1>
    </header>
    <main class="container">
        <p>Bitte geben Sie die Bestellmenge an (Einheit: 500g-Glas)</p>

        <?php if ($errorMessage): ?>
            <p style="color:red;"><?= htmlspecialchars($errorMessage) ?></p>
        <?php endif; ?>

        <form action="" method="post">
            <table>
                <tr>
                    <th>Honig</th>
                    <th>Menge</th>
                </tr>
                <?php foreach ($array_honey as $honey):
                    $nameAttr = preg_replace('/[^a-zA-Z0-9_]/', '_', $honey);
                ?>
                    <tr>
                        <td><?= htmlspecialchars($honey) ?></td>
                        <td>
                            <input type="number" name="<?= $nameAttr ?>" value="<?= $_SESSION[$honey] ?? 0 ?>" size="3" min="0">
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2">
                        <button type="submit">Abschicken</button>
                    </td>
                </tr>
            </table>
        </form>
    </main>
</body>

</html>