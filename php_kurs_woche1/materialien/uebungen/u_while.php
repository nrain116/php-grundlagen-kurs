<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u_while</title>
</head>

<body>
    <table style="border: 1px solid black; border-collapse: collapse;">
        <tr>
            <th style="border: 1px solid black">Spieler 1</th>
            <th style="border: 1px solid black">Spieler 2</th>
        </tr>

        <?php
        $erg1 = rand(1, 6);
        $erg2 = rand(1, 6);

        while ($erg1 < 25 && $erg2 < 25):
            $erg1 += $num;
            $erg2 += $num2;
        ?>
            <tr>
                <td style="border: 1px solid black"><?= $erg1 ?></td>
                <td style="border: 1px solid black"><?= $erg2 ?></td>
            </tr>
        <?php
            $num = rand(1, 6);
            $num2 = rand(1, 6);
        endwhile;
        ?>
    </table>

    <?php if ($erg1 >= 25): ?>
        <p>Spieler 1 hat gewonnen</p>
    <?php elseif ($erg2 >= 25): ?>
        <p>Spieler 2 hat gewonnen</p>
    <?php endif; ?>

</body>

</html>