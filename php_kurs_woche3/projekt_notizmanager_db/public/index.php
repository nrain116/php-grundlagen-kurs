<?php



include_once __DIR__ . '/header.php';

$pageTitle = 'Hallo - Notiz-Manager';

$user_id = getUserId($pdo);

if (is_root()) {
    $notes = getAllNotes($pdo);
} else {
    $notes = getAllNotes($pdo, $user_id);
}


// echo '<pre>', var_dump($_SESSION), '</pre>';
?>

<main class="container">
    <?php if (is_logged_in()): ?>
        <section class="card">
            <h2>Neue Notiz</h2>
            <form action="add.php" method="post">
                <label>
                    Titel <input type="text" name="title" required>
                </label>
                <label>
                    Inhalt <textarea name="content" rows="10" required></textarea>
                </label>
                <label>
                    Kategorie
                    <select name="category_id">
                        <option value="" disabled selected>- keine -</option>
                        <?php foreach ($pdo->query('SELECT id, name FROM categories ORDER BY name') as $cat): ?>
                            <option value="<?= (int)$cat->id ?>"><?= safe($cat->name) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <button type="submit">Speichern</button>
            </form>
        </section>
        <section class="card">
            <h2>Einträge</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Kategorie</th>
                        <th>Datum</th>
                        <th>Author</th>
                        <th>Aktionen</th>
                    </tr>
                </thead>
                <?php foreach ($notes as $note): ?>
                    <tr>
                        <td><?= safe($note->title) ?></td>
                        <td><?= $note->category ?></td>
                        <td><?= safe($note->created_at) ?></td>
                        <?php if (is_root()): ?>
                            <td><?= $note->author ?></td>
                        <?php endif; ?>
                        <td>
                            <a href="edit.php?id=<?= (int)$note->id ?>" class="inline-btn">Bearbeiten</a>
                            <form action="delete.php" method="post" style="display:inline-block; margin-left:6px;">
                                <input type="hidden" name="id" value="<?= (int)$note->id ?>">
                                <button type="submit" class="inline-btn delete button-reset">Löschen</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tbody>

                </tbody>
            </table>
        </section>
    <?php else: ?>
        <section class="card">
            <h4>Ein Notiz Manager mit einer SQL-DB: Login, Logout, Edit , Update, Delete</h4>
            <p>Zuerst einloggen!</p>
        </section>
    <?php endif; ?>
</main>

<?php include_once 'footer.php' ?>