<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u For</title>
</head>

<body>
    <?php
    $output = '';
    for ($i = 13; $i <= 29; $i += 4) {
        $output .= "$i ";
    }
    echo $output . '<br>';

    $output = '';
    for ($i = 2; $i >= -1; $i -= 0.5) {
        $output .= "$i ";
    }
    echo $output . '<br>';

    $output = '';
    for ($i = 2000; $i <= 6000; $i += 1000) {
        $output .= "$i ";
    }
    echo $output . '<br>';

    $output = '';
    for ($i = 5; $i <= 13; $i += 2) {
        $output .= "Z$i ";
    }
    echo $output . '<br>';

    $output = '';
    for ($i = 1; $i <= 3; $i++) {
        $output .= "a b$i ";
    }
    echo $output . '<br>';

    $output = '';
    for ($i = 0; $i <= 2; $i++) {
        if ($i == 0) {
            for ($j = 2; $j <= 3; $j++) {
                $output .= "c$j ";
            }
        } else {
            for ($y = 2; $y <= 3; $y++) {
                $output .= "c$i$y ";
            }
        }
    }
    echo $output . '<br>';


    $output = '';
    for ($i = 13; $i <= 45; $i += 4) {
        if ($i == 29) {
            continue;
        }
        $output .= "$i ";
    }
    echo $output;
    ?>
</body>

</html>