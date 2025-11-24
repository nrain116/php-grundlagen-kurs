<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

$city = array(
    'HH'    => 'Hamburg',
    'B'     => 'Berlin',
    'S'     => 'Stuttgart'
);
$city['F']  = 'Frankfurt';
$city['HB'] = 'Bremen';
unset($city['HB']);
$replace = array('F' => 'Frankfurt am Main');

$city = array_replace($city, $replace);

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
        <h1>Mit eindimensionalen Arrays arbeiten</h1>
    </header>
    <main class="container">
        <h2>Autokennzeichen und dazugehörige Städt</h2>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Kennzeichen</th>
                        <th>Stadt</th>
                    </tr>
                </thead>
                <?php foreach ($city as $key => $val): ?>
                    <tr>
                        <td><?= $key ?></td>
                        <td><?= $val ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </main>
</body>

</html>