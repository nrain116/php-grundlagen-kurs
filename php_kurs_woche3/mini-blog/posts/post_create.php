<?php

$pageTitle = 'Post erstellen'; // MUST be set before including header

include_once __DIR__ . '/../inc/_header.inc.php';
include_once __DIR__ . '/../inc/functions.inc.php'; // make sure addPost() and fetchCat() are included

$header = $_POST['header'] ?? '';
$content = $_POST['content'] ?? '';
$catId = (int)($_POST['catId'] ?? 0);
$imageFilename = ''; // uploaded file name
$error = '';
$success = '';
$userId = getUserId($pdo, $_SESSION['email'] ?? '');
$cats = fetchCat($pdo);

$upload_dir = __DIR__ . '/../images/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true); // create folder if not exists

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Basic validation
    if ($catId <= 0 || trim($header) === '' || trim($content) === '') {
        $error = 'Bitte alle Felder ausfüllen!';
    } else {
        // Handle file upload
        if (!empty($_FILES['datei']) && $_FILES['datei']['error'] === UPLOAD_ERR_OK) {
            $allowed_files = [
                'image/jpeg' => 'jpg',
                'image/png'  => 'png',
                'image/gif'  => 'gif'
            ];

            $type = mime_content_type($_FILES['datei']['tmp_name']);
            if (isset($allowed_files[$type]) && filesize($_FILES['datei']['tmp_name']) <= 2000000) {
                $ext = $allowed_files[$type];
                $imageFilename = md5(uniqid($_FILES['datei']['tmp_name'], true)) . '.' . $ext;
                $upload_path = $upload_dir . $imageFilename;

                if (!move_uploaded_file($_FILES['datei']['tmp_name'], $upload_path)) {
                    $error = 'Fehler beim Hochladen der Datei!';
                }
            } else {
                $error = 'Ungültiger Dateityp oder Datei zu groß.';
            }
        }

        // If no error, insert post
        if ($error === '') {
            addPost($pdo, $userId, $catId, $header, $content, $imageFilename);
            $success = 'Beitrag erfolgreich erstellt!';
            // Clear form
            $header = '';
            $content = '';
            $catId = 0;
            $imageFilename = '';
        }
    }
}

?>

<main class="container">
    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
    <?php echo 'PHP läuft als: ' . exec('whoami'); ?>

    <section class="card">
        <form action="" method="post" enctype="multipart/form-data">
            <label>Kategorie:</label>
            <select name="catId" required>
                <option value="" disabled <?= $catId == 0 ? 'selected' : '' ?>>--Bitte eine Kategorie auswählen--</option>
                <?php foreach ($cats as $cat): ?>
                    <option value="<?= $cat->categ_id ?>" <?= $catId == $cat->categ_id ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat->categ_name) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label>Header:
                <input type="text" name="header" value="<?= htmlspecialchars($header) ?>">
            </label>

            <label>Content:
                <textarea id="content" name="content" rows="20"><?= htmlspecialchars($content) ?></textarea>
            </label>

            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <label>Bild hochladen (*.jpg, *.png, *.gif):
                <input name="datei" type="file" accept="image/gif,image/jpeg,image/png">
            </label>

            <button type="submit">Erstellen</button>
            <button type="reset">Zurücksetzen</button>
        </form>
    </section>
</main>