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
            'image/jpeg'        => 'jpg',
            'image/gif'         => 'gif',
            'image/png'         => 'png',
            'image/webp'        => 'webp',
            'application/pdf'   => 'pdf',
        ];


        /* Prüfe, ob das Formular gesendet wurde, $_FILES befüllt ist und kein Fehler vorliegt */
        if (!empty($_FILES)):

            $messages = [];

            switch ($_FILES['datei']['error']) {
                case UPLOAD_ERR_OK:
                    $messages[] = ['good' => 'Datei wurde erfolgreich hochgeladen'];
                    break;
                case UPLOAD_ERR_INI_SIZE:
                    $messages[] = ['bad' => 'Die Datei überschreitet die maximal erlaubte Größe von: ' . ini_get('upload_max_filesize')];
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $messages[] = ['bad' => 'Die Datei überschreitet die maximal erlaubte Größe von: ' . $_POST['MAX_FILE_SIZE'] . ' Bytes'];
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $messages[] = ['bad' => 'Es wurde keine Datei ausgewählt'];
                    break;
                default:
                    $messages[] = ['bad' => 'Upload der Datei fehlgeschlagen'];
                    break;
            }

            if (!empty($messages)): ?>
                <ul>
                    <?php foreach ($messages as $msgs): ?>
                        <?php foreach ($msgs as $class => $msg): ?>
                            <li class="<?= htmlspecialchars($class) ?>">
                                <?= htmlspecialchars($msg) ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </ul>
                <?php
            endif;
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