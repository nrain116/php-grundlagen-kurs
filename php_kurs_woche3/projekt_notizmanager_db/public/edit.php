<?php

include_once 'header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] :  0;
$note = $id ? findNote($pdo, $id) : null;

if (!$note) {
    header('Location: index.php');
    exit;
}
?>


<main class="container">
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= (int)$note->id ?>">
        <label>
            Titel <input type="text" name="title" value="<?= safe($note->title) ?>" required>
        </label>
        <label>
            Inhalt <textarea name="content" rows="10" required><?= safe($note->content) ?></textarea>
        </label>
        <label>
            Kategorie
            <select name="category_id">
                <?php foreach ($pdo->query('SELECT id, name FROM categories ORDER BY name') as $cat): ?>
                    <option value="<?= (int)$cat->id ?>" <?= ($note->category_id ?? null) == $cat->id ? 'selected' : '' ?>><?= safe($cat->name) ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <div style="display: flex; gap: 10px; align-items: center; margin-top: 10px;">
            <button type="submit">Speichern</button>
            <a href="index.php" class="button" style="text-decoration: none; padding: 6px 12px; border: 1px solid #ccc; border-radius: 4px; background: #f0f0f0; color: #333;">Abbrechen</a>
        </div>

    </form>
</main>
<?php include_once 'footer.php' ?>