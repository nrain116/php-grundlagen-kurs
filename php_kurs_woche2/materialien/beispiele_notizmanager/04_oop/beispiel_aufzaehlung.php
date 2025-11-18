<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

/** 
 * einfache Azfzählung
 **/
enum Skat
{
    case Eichel;
    case Gruen;
    case Herz;
    case Schellen;

    function getName()
    {
        return $this->name;
    }
}

/**
 * gesicherte Aufzählung (backend enumeration) 
 * Typhinweis darf *ausschließlich* int oder string sein
 * ein vorhandener Wert kann nicht an ein weiteres Element gehängt werden
 * Aufzählungen besitzen grundsätzlich eine schreibgeschützte Eigenschaft name
 * gesicherte Aufzählungen besitzen zusätzlich noch die Eigenschaft value
 **/
enum Status: string
{
    case undone = 'offen';
    case send = 'gesendet';
    case done = 'abgeschlossen';

    /* Dies wird nicht funktionen: Fatal Error */
    // case success = 'abgeschlossen';
}

function getStatus(Status $stat)
{
    return "Name: $stat->name, Wert: $stat->value";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auszählung</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>

<body>
    <header>
        <h1>Aufzählung (enum)</h1>
    </header>
    <main class="container">
        <h2>einfache Aufzählungen</h2>
        <article class="post">
            <p><?= Skat::Herz->getName() ?> ist Trumpf</p>
        </article>
        <h2>gesicherte Aufzählungen</h2>
        <article class="post">
            <p><?= getStatus(Status::send) ?></p>
        </article>
    </main>
</body>

</html>