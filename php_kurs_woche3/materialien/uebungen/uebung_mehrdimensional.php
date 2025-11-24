<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);
$sportfest = array(
    array(
        'begin' => '09:30 Uhr',
        'disciplin' => 'Diskuswurf',
        'place' => 'Nebenplatz',
        'desc' => 'Jugendmeisterschaften'
    ),
    array(
        'begin' => '10:00 Uhr',
        'disciplin' => '5-km-Lauf',
        'place' => 'Stadion - Laufbahn',
        'desc' => 'Offener Lauf'
    ),
    array(
        'begin' => '11:00 Uhr',
        'disciplin' => 'Halbmarathon',
        'place' => 'Waldgebiet',
        'desc' => 'Teilnahme ab 18 Jahren'
    ),
    array(
        'begin' => '12:00 Uhr',
        'disciplin' => 'Stabhochsprung',
        'place' => 'Stadion - Stabhochsprunganlage',
        'desc' => 'Nur Frauen'
    ),
)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array-Übung</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>

<body>
    <header>
        <h1>Mit mehrdimensionalen Arrays arbeiten</h1>
    </header>
    <main class="container">
        <h2>Sportfest: Startzeiten und Veranstatungen</h2>
        <table>
            <thead>
                <th>Beginn</th>
                <th>Disziplin</th>
                <th>Ort</th>
                <th>Bemerkung</th>
            </thead>
            <?php foreach ($sportfest as $sport): ?>
                <tr>
                    <td><?= $sport['begin'] ?></td>
                    <td><?= $sport['disciplin'] ?></td>
                    <td><?= $sport['place'] ?></td>
                    <td><?= $sport['desc'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
</body>

</html>