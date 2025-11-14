<?php

declare(strict_types=1);
$score = 93;
$note = "";

// Score größer als 90 = Sehr gut, größer als 75 = Gut, alles andere OK

if ($score >= 90) {
  $note = "Sehr gut";
} elseif ($score >= 75) {
  $note = "Gut";
} else {
  $note = "OK";
}

?>
<!doctype html>
<html lang="de">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>If/Else Beispiel</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>

<body>
  <header>
    <h1>Kontrollstrukturen</h1>
  </header>
  <main class="container">
    <p>Punkte: <?= $score ?> --> Note: <strong class="<?= $note === 'Sehr gut' ? 'good' : ($note === 'Gut' ? 'ok' : 'bad') ?>"><?= $note ?></strong></p>

    <h2>Der Spaceship Operator <code>
        <=>
      </code></h2>
    <?php

    $i = 7;
    $k = 6;

    /* 
       * Der Spaceship-Operator ergibt:
       *  1: der linke Wert ist größer
       * -1: der rechte Wert ist größer
       *  0: beide Werte sind gleich
       */

    $erg = $i <=> $k;

    echo '<p>Das Ergebnis des Vergleichs ist: ' . $erg . '</p>'

    ?>

    <h2>Der Null coalescing Operator</h2>

    <?php

    $x = 5;
    $z = $y ?? $x;

    echo '<p><code>$z = $y ?? $x</code> ergibt: ' . $z . '</p>';

    ?>

    <h2>Switch</h2>

    <?php

    $tag = 'Dienstag';

    echo '<p>';
    switch ($tag) {
      case 'Samstag':
        echo 'Wochenende (Sa.)';
        break;
      case 'Sonntag':
        echo 'Wochenende (So.)';
        break;
      default:
        echo 'Leider kein Wochenende.';
    }
    echo '</p>';

    $gewicht = 32;
    echo "<p>Das Gepäckstück wiegt $gewicht kg. Es gehört zur Kategorie ";

    switch (true) {
      case ($gewicht <= 20):
        echo 'S (bis 20kg)';
        break;
      case ($gewicht <= 40):
        echo 'M (bis 40kg)';
        break;
      default:
        echo 'L (über 40kg)';
    }

    echo '.</p>';

    $note = 'nb';

    switch ($note) {
      case 1:
      case 2:
      case 3:
      case 4:
        echo '<p class="good">Test bestanden</p>';
        break;
      case 5:
      case 6:
        echo '<p class="bad">Test nicht bestanden</p>';
        break;
      case 'nb':
        echo '<p class="ok">Der Test konnte nicht bewertet werden.</p>';
        break;
      default:
        echo '<p class="bad">Es wurde kein auswertbarer Wert erkannt.</p>';
    }

    ?>

    <h2>Match</h2>

    <?php

    $farbe = 'blau';
    $erg = match ($farbe) {
      'gruen', 'blau'   => 'o gewinnt',
      'rot'     => 'rote Zahlen gewinnen',
      'schwarz' => 'schwarze Zahlen gewinnen',
      default   => 'kein korrekter Wert'
    };

    echo "<p>Die Farbe ist $farbe.</p>";
    echo "<p><code>match()</code> gibt zurück: $erg.</p>";
    ?>
  </main>
</body>

</html>