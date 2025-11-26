<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

$string = $_POST['text'] ?? '';
$search = $_POST['search'] ?? '';

$count = 0;
$highlighted = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');

if ($search !== '') {

    $searchQuoted = preg_quote($search, '/');

    // Unicode-aware whole word, hyphen excluded after the word
    $pattern = '/(?<!\p{L})' . $searchQuoted . '(?![\p{L}-])/ui';

    // Count matches
    preg_match_all($pattern, $string, $matches);
    $count = count($matches[0]);

    // Highlight matches
    $rawHighlighted = preg_replace($pattern, '<mark>$0</mark>', $string);

    // Escape HTML but keep <mark>
    $highlighted = htmlspecialchars($rawHighlighted, ENT_QUOTES, 'UTF-8');
    $highlighted = str_replace(
        ['&lt;mark&gt;', '&lt;/mark&gt;'],
        ['<mark>', '</mark>'],
        $highlighted
    );
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String-Funktionen</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>

<body>
    <header>
        <h1>String-Funktionen</h1>
    </header>
    <main class="container">
        <h2>Begriff in einer Textpassage suchen</h2>

        <section class="card">
            <form action="" method="post">
                <label>Originaltext</label>
                <textarea name="text" rows="20"><?= htmlspecialchars($string) ?></textarea>

                <label>Suche</label>
                <input type="text" name="search" value="<?= htmlspecialchars($search) ?>">

                <button type="submit">Zeichenkette suchen</button>
            </form>
        </section>
        <?php if ($_POST): ?>
            <section class="card">
                <p>
                    Suche nach "<b style="color: blue;"><?= htmlspecialchars($_POST['search'] ?? '') ?></b>"
                    - <b style="color: red;"><?= $count ?></b> gefunden
                </p>

                <br>
                <p><?= nl2br($highlighted) ?></p>
            </section>
        <?php endif; ?>
    </main>
</body>

</html>