<?php
include_once __DIR__ . '/header.php';
require_once __DIR__ . '/../inc/db-connect.php';
require_once __DIR__ . '/../inc/functions.php';

$pageTitle = 'Hardware - Datenbank';

// Get search/filter inputs
$artnummer = trim($_POST['artnummer'] ?? '');
$hersteller = trim($_POST['hersteller'] ?? '');
$typ = trim($_POST['typ'] ?? '');
$gb = (int)($_POST['gb'] ?? 0);
$preis = (float)($_POST['preis'] ?? 0.0);
$prod = trim($_POST['prod'] ?? '');

$action = $_POST['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'filter' && ($artnummer || $hersteller || $typ || $gb || $preis || $prod)) {
        $hardware = searchHardware($pdo, $artnummer, $hersteller, $typ, $gb, $preis, $prod);
    } else {
        // action = 'reset' or no filters → fetch all
        $hardware = fetchNotes($pdo);
    }
} else {
    // initial page load without POST
    $hardware = fetchNotes($pdo);
}
?>

<main class="container">
    <details class="card">
        <summary>Neue Hardware anlegen</summary>
        <form action="add.php" method="post">
            <label>
                Artikel-Nummer <input type="text" name="artnummer" required>
            </label>
            <label>
                Hersteller <input type="text" name="hersteller" required>
            </label>
            <label>
                Typ <input type="text" name="typ" required>
            </label>
            <label>
                GB <input type="number" name="gb" required>
            </label>
            <label>
                Preis <input type="number" name="preis" required>
            </label>
            <label>
                Produktionsdatum<input type="date" name="prod" required>
            </label>
            <button type="submit">Speichern</button>
        </form>
    </details>

    <details class="card">
        <summary>
            Filter / Suche
            <form action="" method="post">
                <button type="submit" name="action" value="reset">Alle anzeigen</button>
            </form>
        </summary>
        <!-- Post to the same page -->
        <form action="" method="post">
            <label>
                Artikel-Nummer <input type="text" name="artnummer" value="<?= htmlspecialchars($artnummer) ?>">
            </label>
            <label>
                Hersteller <input type="text" name="hersteller" value="<?= htmlspecialchars($hersteller) ?>">
            </label>
            <label>
                Typ <input type="text" name="typ" value="<?= htmlspecialchars($typ) ?>">
            </label>
            <label>
                GB <input type="number" name="gb" value="<?= $gb ?: '' ?>">
            </label>
            <label>
                Preis <input type="number" name="preis" value="<?= $preis ?: '' ?>">
            </label>
            <label>
                Produktionsdatum<input type="date" name="prod" value="<?= htmlspecialchars($prod) ?>">
            </label>
            <button type="submit" name="action" value="filter">Filtern</button>
        </form>
    </details>

    <section class="card">
        <h2>Einträge</h2>
        <table>
            <thead>
                <tr>
                    <th>Artikelnummer</th>
                    <th>Hersteller</th>
                    <th>Typ</th>
                    <th>Gbyte</th>
                    <th>Preis</th>
                    <th>Produktionsdatum</th>
                    <th>Aktionen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hardware as $item): ?>
                    <tr>
                        <td><?= safe($item->artnummer) ?></td>
                        <td><?= safe($item->hersteller) ?></td>
                        <td><?= safe($item->typ) ?></td>
                        <td><?= $item->gb ?></td>
                        <td><?= $item->preis ?></td>
                        <td><?= safe($item->prod) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $item->artnummer ?>" class="inline-btn">Bearbeiten</a>
                            <form action="delete.php" method="post" style="display:inline-block; margin-left:6px;"
                                onsubmit="return confirm('Möchten Sie diesen Eintrag wirklich löschen?')">
                                <input type="hidden" name="artnummer" value="<?= $item->artnummer ?>">
                                <button type="submit" class="inline-btn delete button-reset">Löschen</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>

<?php include_once 'footer.php' ?>