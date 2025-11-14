<?php
function ostersonntag($year)
{
    $a = $year % 19;
    $b = $year % 4;
    $c = $year % 7;
    $d = (19 * $a + 24) % 30;
    $e = (2 * $b + 4 * $c + 6 * $d + 5) % 7;
    $day = 22 + $d + $e;

    if ($day <= 31) {
        return sprintf("%02d.03.%d", $day, $year);
    } else {
        $day -= 31;
        return sprintf("%02d.04.%d", $day, $year);
    }
}
