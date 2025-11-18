<?php

declare(strict_types=1);
/**
 * Interface Tier
 * 
 * Ein Interface legt fest, welche Methoden eine abgeleitete Klasse zwingend implementieren muss
 * Ein Interface legt *nicht* fest was diese Methode ausführen soll
 **/

interface Tier
{
    public function getRasse();
}
