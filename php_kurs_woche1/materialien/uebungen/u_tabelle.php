<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u_tabelle</title>
</head>

<body>
    <table style="border-collapse: collapse;">
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <tr>
                <?php for ($y = 1; $y <= 10; $y++): ?>
                    <td style="border: 0.5px solid black; padding 5px; text-align: center"><?= $i * $y ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>

</html>