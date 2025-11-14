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

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #888;
            padding: 6px 12px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <h2>Ostersonntag></h2>

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
</body>

</html>