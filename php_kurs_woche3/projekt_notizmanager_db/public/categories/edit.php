<?php

declare(strict_types=1);
// ! die folgenden 2 Zeilen in der Produktiv-Variante löschen!
error_reporting(E_ALL);
ini_set('display_errors', true);

include_once '../header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$category = $id ? findCategory($pdo, $id) : null;
if (!$category) {
    header('Location: ../categ-manager.php');
    exit;
}
?>

<main class="container">
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= (int)$category->id ?>">
        <label>Kategorie-Name <input type="text" name="name" value="<?= safe($category->name) ?>" required></label>
        <div style="display: flex; gap: 10px; align-items: center; margin-top: 10px;">
            <button type="submit">Speichern</button>
            <a href="../categ-manager.php" class="button" style="text-decoration: none; padding: 6px 12px; border: 1px solid #ccc; border-radius: 4px; background: #f0f0f0; color: #333;">Abbrechen</a>
        </div>
    </form>
</main>

<?php include_once '../footer.php'; ?>