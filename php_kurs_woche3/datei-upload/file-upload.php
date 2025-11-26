<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datei-Upload</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Datei-Upload: File-Upload</h1>
    </header>
    <main class="container">
        <?php

        if (!empty($_FILES)) {
            // Debug-Ausgabe mit echo
            echo '<pre>' . htmlspecialchars(print_r($_FILES, true)) . '</pre>';
            echo '<pre>UPLOAD_ERR_OK: ' . UPLOAD_ERR_OK . '</pre>';
        }

        $allowed_files = [
            'image/jpeg' => 'jpg',
            'image/gif'  => 'gif',
            'image/png'  => 'png'
        ];

        /* Prüfe, ob das Formular gesendet wurde, $_FILES befüllt ist und kein Fehler vorliegt */
        if (!empty($_FILES) && $_FILES['datei']['error'] === UPLOAD_ERR_OK):
            $type = mime_content_type($_FILES['datei']['tmp_name']);
            $new_filename = '';

            /* Dateityp prüfen */
            if (isset($allowed_files[$type])):
                /* Dateigröße prüfen */
                if (filesize($_FILES['datei']['tmp_name']) <= 2000000): ?>
                    <p class="good">Dateitype und -größe sind ok, die Datei kann an ihr endgültiges Ziel verschoben werden.</p>
                <?php else: ?>
                    <p class="bad">Datei zu groß.</p>
                <?php endif; ?>
            <?php else: ?>
                <p class="bad">Falscher Dateityp.</p>
            <?php endif; ?>
        <?php endif; ?>


    </main>
</body>

</html>