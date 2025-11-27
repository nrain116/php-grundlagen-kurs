<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);
include_once __DIR__ . '/inc/_header.inc.php';
include_once __DIR__ . '/inc/functions.inc.php';

$posts = fetchPosts($pdo);

$img = [];
foreach ($posts as $p) {
    $img = [$p->posts_image];
}
?>

<main class="container">
    <?php if ($_SESSION): ?>


        <!-- <a href="posts/post_create.php"
                    style="font-size: 1.5rem; text-decoration: none; padding: 0 6px;">➕</a> -->
        <section class="card" style="
    width: 72%;        /* slightly wider than table for padding */
    margin: 20px auto; /* centers the section horizontally */
    padding: 10px 0;   /* optional vertical padding */
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    border-radius: 6px;
    background-color: #fff;
">
            <h2 style="
        cursor: pointer;
        font-weight: bold;
        font-size: 1.2rem;
        padding: 8px 12px;
        border-bottom: 1px solid #ddd;
        background-color: #ffffff;
        color: black;
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
        display: block;
        margin: 0; /* remove default h2 margin */
        text-align:center;
    ">
                Liste aller Post-Title
            </h2>
        </section>
        <table style="
                margin: 0 auto;
                width: 70%;
                border-collapse: collapse;
                font-size: 0.95rem;
            ">
            <thead>
                <tr>
                    <th style="padding: 10px; text-align: center; width: 120px;">Header</th>
                    <th style="padding: 10px; text-align: center; width: 120px;">Kategorie</th>
                    <th style="padding: 10px; text-align: center; width: 120px;">Aktion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $p): ?>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px; text-align: center;">
                            <a href="posts/post_single.php?id=<?= $p->posts_id ?>"
                                style="text-decoration: none; color: #2a7fde;">
                                <?= htmlspecialchars($p->posts_header) ?>
                            </a>
                        </td>
                        <td style="padding: 10px; text-align: center;">
                            <?= fetchCategoryName($pdo, $p->posts_categ_id_ref) ?>
                        </td>
                        <td style="padding: 6px; text-align: center; white-space: nowrap;">

                            <!-- Edit button -->
                            <a href="posts/post_edit.php?id=<?= $p->posts_id ?>"
                                style="
                       display: inline-flex;
                       justify-content: center;
                       align-items: center;
                       width: 28px;
                       height: 28px;
                       font-size: 1rem;
                       background-color: #007bff;
                       color: white;
                       border-radius: 4px;
                       text-decoration: none;
                       margin-right: 4px;
                   ">
                                ✎
                            </a>

                            <!-- Delete button -->
                            <form action="inc/_delete.inc.php" method="post" style="display: inline-flex; margin: 0;"
                                onsubmit="return confirm('Möchten Sie diesen Eintrag wirklich löschen?')">
                                <input type="hidden" name="postId" value="<?= $p->posts_id ?>">
                                <button type="submit"
                                    style="
                            display: inline-flex;
                            justify-content: center;
                            align-items: center;
                            width: 28px;
                            height: 28px;
                            font-size: 1rem;
                            background-color: #d9534f;
                            color: white;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                            padding: 0;
                        ">
                                    🗑
                                </button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else: ?>
        <p> Einloggen und dein Mini-Blog starten</p>
    <?php endif; ?>

</main>



<?php include_once __DIR__ . '/inc/_footer.inc.php' ?>