<?php

declare(strict_types=1);

function fetchNotes(PDO $pdo): array
{
    $sql = 'SELECT * FROM fp';
    return $pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);
}

function safe(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function addHardware(PDO $pdo, string $artnummer, string $hersteller, string $typ,  int $gb, float $preis, string $date): void
{
    $stmt = $pdo->prepare('INSERT INTO fp(artnummer, hersteller, typ, gb, preis, prod) 
                           VALUES (:a, :h, :z, :g, :p, :pr)');
    $stmt->execute([
        ':a'    => $artnummer,
        ':h'    => $hersteller,
        ':z'    => $typ,
        ':g'    => $gb,
        ':p'    => $preis,
        ':pr'   => $date,

    ]);
}

function updateHardware(PDO $pdo, int $id, string $title, string $content, ?int $categoryId = null): void
{
    $stmt = $pdo->prepare('UPDATE notes SET title=:t, content=:c, category_id=:cat WHERE id=:id');
    $stmt->execute([':t' => $title, ':c' => $content, ':cat' => $categoryId, ':id' => $id]);
}

function deleteHardware(PDO $pdo, string $artnr): void
{
    $stmt = $pdo->prepare('DELETE FROM fp WHERE artnummer=:artnr');
    $stmt->execute([':artnr' => $artnr]);
}


function seachHardWare(PDO $pdo, ?string $artnummer, ?string $hersteller, ?string $typ,  ?int $gb, ?float $preis, ?string $date)
{
    $stmt = $pdo->prepare('SELECT *  FROM fp WHERE ');
}
