<?php

include("ostersonntag.inc.php");

$startjahr = $_POST['startjahr'] ?? 2020;
$endjahr   = $_POST['endjahr'] ?? $startjahr;

if ($startjahr > $endjahr) {
    [$startjahr, $endjahr] = [$endjahr, $startjahr];
}

$results = [];
for ($jahr = $startjahr; $jahr <= $endjahr; $jahr++) {
    $results[] = [
        'jahr'  => $jahr,
        'datum' => ostersonntag($jahr)
    ];
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Ostersonntag</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <header>
        <h2>Ostersonntag</h2>
    </header>

    <main class="container">
        <table>
            <thead>
                <tr>
                    <th>Jahr</th>
                    <th>Datum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['jahr']) ?></td>
                        <td><?= htmlspecialchars($row['datum']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>

</html>