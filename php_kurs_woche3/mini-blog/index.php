<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);
include_once __DIR__ . '/inc/_header.inc.php';
include_once __DIR__ . '/inc/functions.inc.php';

?>

<main class="container">
    <?php if ($_SESSION): ?>
        <p>Hallo </p>

    <?php else: ?>
        <p> Einloggen und dein Mini-Blog starten</p>
    <?php endif; ?>

</main>



<?php include_once __DIR__ . '/inc/_footer.inc.php' ?>