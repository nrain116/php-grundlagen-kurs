<?php



include_once __DIR__ . '/header.php';

$pageTitle = 'Hardware - Datenbank';

$hardware = fetchNotes($pdo);

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
        <summary>Filter/Suche</summary>
        <form action="search.php" method="post">
            <label>
                Artikel-Nummer <input type="text" name="artnummer">
            </label>
            <label>
                Hersteller <input type="text" name="hersteller">
            </label>
            <label>
                Typ <input type="text" name="typ">
            </label>
            <label>
                GB <input type="number" name="gb">
            </label>
            <label>
                Preis <input type="number" name="preis">
            </label>
            <label>
                Produktionsdatum<input type="date" name="prod">
            </label>
            <button type="submit">Filtern</button>
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
                </tr>
            </thead>
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
            <tbody>
            </tbody>
        </table>
    </section>
</main>

<?php include_once 'footer.php' ?>