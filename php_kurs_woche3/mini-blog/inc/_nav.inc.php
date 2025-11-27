<nav>
    <div class="container">
        <ul>
            <li><a href="<?= BASE_URL ?>index.php">Startseite</a></li>
            <?php if (isset($_SESSION['email']) && $_SESSION['email'] === 'root@root.com'): ?>
                <li><a href="<?= BASE_URL ?>category/cat-create.php">Kategorie erstellen</a></li>
            <?php endif; ?>
            <?php if (!empty($_SESSION['email'])): ?>
                <li><a href="<?= BASE_URL ?>password_change.php">Password ändern</a></li>
            <?php else: ?>
                <li><a href="<?= BASE_URL ?>user/register.php">Registrieren</a></li>
            <?php endif; ?>
        </ul>
        <div class="text-muted">
            <?php if (!empty($_SESSION['email'])): ?>
                Eingeloggt als <strong><?= safe($_SESSION['email']) ?></strong> - <a href="<?= BASE_URL ?>user/logout.php">Logout</a>
            <?php else: ?>
                <a href="<?= BASE_URL ?>user/login.php">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>