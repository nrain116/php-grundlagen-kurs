<?php

declare(strict_types=1);

class Note
{/*  Öffentliche Klassen sollten vermieden werden
    public string $title;
    public string $content;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    } */

    /**
     * Konstanten sind immer public 
     * sie können keine andere Sichtbarkeit annehmen
     * sie sind unabhängig von einzelnen Objekten
     * sie sind insgesamt nur einmal vorhanden
     **/
    const TYP = 'Notiz';

    /**
     * statische Eigenschaften
     * sind unabhängig von Objekten
     * sind insgesamt nur einmal vorhanden
     * sollten unmittelbar zu Beginn initialisiert werden
     **/
    static $anzahl = 0;

    /* Constructor Property Promotion */
    public function __construct(private readonly int $number, private string $title, private string $content)
    {
        self::$anzahl++;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getNumber()
    {
        return $this->number;
    }

    static public function makeCopy(Note $origional, int $number, string $title, string $content)
    {
        $new = new Note($number, $title, $content);
        $new->title = 'Kopie von ' . $origional->title;
        return $new;
    }

    function __toString()
    {
        return "__toString() -> $this->number von " . self::$anzahl . " \"$this->title: $this->content\" vom Type " . self::TYP;
    }

    /* magische Methode zum Klonen */
    function __clone()
    {
        $this->title = "Klon von $this->title";
        $this->number = self::$anzahl + 1;
    }

    function __destruct()
    {
        echo '<br>Destruktor';
    }
}
