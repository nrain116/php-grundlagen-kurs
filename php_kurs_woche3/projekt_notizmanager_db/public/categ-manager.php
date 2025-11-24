<?php
$pageTitle = 'Kategorien - Notiz-Manager';
include_once 'header.php';
require_login();
$categs = getAllCategories($pdo);
?>

<main class="container">
    <details class="card">
        <summary>Neue Kategorie</summary>
        <form action="categories/add.php" method="post">
            <label>
                Kategorie-Name <input type="text" name="name" required>
            </label>
            <button type="submit">Speichern</button>
        </form>
    </details>

    <section class="card">
        <h2>Einträge</h2>
        <table>
            <thead>
                <tr>
                    <th>Kategorie</th>
                    <th>Aktionen</th>
                </tr>
            </thead>
            <?php foreach ($categs as $c): ?>
                <tr>
                    <td><?= safe($c->name) ?></td>
                    <td>
                        <a href="categories/edit.php?id=<?= (int)$c->id ?>" class="inline-btn">Bearbeiten</a>
                        <form action="categories/delete.php" style="display:inline-block; margin-left:6px;" method="post">
                            <input type="hidden" name="id" value="<?= (int)$c->id ?>">
                            <button type="submit" class="inline-btn delete button-reset">Löschen</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tbody>

            </tbody>
        </table>
    </section>
</main>
<?php include_once 'footer.php' ?>