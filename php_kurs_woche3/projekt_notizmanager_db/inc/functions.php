<?php

declare(strict_types=1);

function getAllNotes(PDO $pdo, ?int $userId = null): array
{
    if ($userId === null) {
        // Admin → get ALL notes with author
        $sql = 'SELECT n.id, n.title, n.content, n.created_at,
                       n.user_id, u.username AS author,
                       c.name AS category
                FROM notes n
                LEFT JOIN categories c ON c.id = n.category_id
                LEFT JOIN users u ON u.id = n.user_id
                ORDER BY n.id DESC';

        return $pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    // Normal user → only own notes, no author
    $sql = 'SELECT n.id, n.title, n.content, n.created_at,
                   n.user_id,
                   c.name AS category
            FROM notes n
            LEFT JOIN categories c ON c.id = n.category_id
            WHERE n.user_id = :user_id
            ORDER BY n.id DESC';

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id' => $userId]);

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function safe(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function addNote(PDO $pdo, string $title, string $content, int $userId, ?int $categoryId = null): void
{
    $stmt = $pdo->prepare('INSERT INTO notes(title, content, category_id, user_id) 
                           VALUES (:t, :c, :cat, :u)');
    $stmt->execute([
        ':t' => $title,
        ':c' => $content,
        ':cat' => $categoryId,
        ':u' => $userId
    ]);
}


function findNote(PDO $pdo, int $id): ?object
{
    $stmt = $pdo->prepare('SELECT * FROM notes WHERE id=:id');
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch();
    return $row ?: null;
}

function updateNote(PDO $pdo, int $id, string $title, string $content, ?int $categoryId = null): void
{
    $stmt = $pdo->prepare('UPDATE notes SET title=:t, content=:c, category_id=:cat WHERE id=:id');
    $stmt->execute([':t' => $title, ':c' => $content, ':cat' => $categoryId, ':id' => $id]);
}

function deleteNote(PDO $pdo, int $id): void
{
    $stmt = $pdo->prepare('DELETE FROM notes WHERE id=:id');
    $stmt->execute([':id' => $id]);
}

function getAllCategories(PDO $pdo): array
{
    $sql = 'SELECT c.id, c.name
    FROM categories c
    ORDER BY c.id DESC';

    return $pdo->query($sql)->fetchAll();
}

function addCategory(PDO $pdo, string $name): void
{
    $stmt = $pdo->prepare('INSERT INTO categories(name) VALUES (:n)');
    $stmt->execute([':n' => $name]);
}

function findCategory(PDO $pdo, int $id): ?object
{
    $stmt = $pdo->prepare('SELECT * FROM categories WHERE id=:id');
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch();
    return $row ?: null;
}

function updateCategory(PDO $pdo, int $id, string $name): void
{
    $stmt = $pdo->prepare('UPDATE categories SET name=:n WHERE id=:id');
    $stmt->execute([':n' => $name, ':id' => $id]);
}

function deleteCategory(PDO $pdo, int $id): void
{
    $stmt = $pdo->prepare('DELETE FROM categories WHERE id=:id');
    $stmt->execute([':id' => $id]);
}

function authenticate(PDO $pdo, string $username, string $password): bool
{
    $stmt = $pdo->prepare('SELECT id, password_hash FROM users WHERE username=:u');
    $stmt->execute([':u' => $username]);
    $row = $stmt->fetch();
    if (!$row) return false;
    return password_verify($password, $row->password_hash);
}

function current_user(): ?string
{
    return isset($_SESSION['user']) && $_SESSION['user'] !== ''
        ? (string)$_SESSION['user']
        : null;
}

function is_logged_in(): bool
{
    return isset($_SESSION['user']) && $_SESSION['user'] !== '';
}

/* Schütz eine Seite vor unbefugtem Zugriff */
function require_login(): void
{
    if (!is_logged_in()) {
        header('Location: login.php');
        exit;
    }
}

/* get userID */
function getUserId(PDO $pdo): ?int
{
    if (!is_logged_in()) {
        return null; // no user logged in
    }

    $stmt = $pdo->prepare('SELECT id FROM users WHERE username = :username LIMIT 1');
    $stmt->execute([
        ':username' => $_SESSION['user']
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user ? (int)$user['id'] : null;
}

function is_root(): bool
{
    return isset($_SESSION['user']) && $_SESSION['user'] === 'root';
}

function fetchNotesForUser($pdo, $user_id)
{
    if (is_root()) {
        return getAllNotes($pdo);
    } else {
        return getAllNotes($pdo, $user_id);
    }
}
