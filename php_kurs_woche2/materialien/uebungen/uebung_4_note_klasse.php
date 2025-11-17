<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);
/**
 * Aufgabe:
 * 1) Definiere class Note (title, content, __construct).
 * 2) Erzeuge mehrere Objekte und gib sie in HTML aus.
 * 3) Optional: Lese Daten aus notes.json und wandle sie in Objekte um.
 */
require_once __DIR__ . '/class/Note.php';
$path = __DIR__ . '/notes.json';
$notesData = is_file($path) ? json_decode((string)file_get_contents($path), true) : [];
$notes = [];

foreach ($notesData as $note) {
  $notes[] = new Note($note['title'], $note['content']);
}

?>
<!doctype html>
<html lang="de">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Übung 4 – Note-Klasse</title>
  <link rel="stylesheet" href="../style/style.css">
</head>

<body>
  <header>
    <h1>Übung 4 – Note-Klasse</h1>
  </header>
  <main class="container">
    <!-- TODO -->
    <?php foreach ($notes as $note): ?>
      <article class="post">
        <h2><?= htmlspecialchars($note->getTitle()) ?></h2>
        <p><?= htmlspecialchars($note->getContent()) ?></p>
      </article>
    <?php endforeach; ?>
  </main>
</body>

</html>