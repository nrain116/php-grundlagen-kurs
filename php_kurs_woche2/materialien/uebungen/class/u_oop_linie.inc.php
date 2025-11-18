<?php
require_once 'u_oop_punkt.inc.php';

class Linie
{
    private Punkt $start;
    private Punkt $ende;

    public function __construct(?Punkt $start = null, ?Punkt $ende = null)
    {
        $this->start = $start ?? new Punkt();
        $this->ende  = $ende  ?? new Punkt();
    }

    public function verschieben(float $dx, float $dy)
    {
        $this->start->verschieben($dx, $dy);
        $this->ende->verschieben($dx, $dy);
    }

    public function __toString(): string
    {
        return "($this->start) | ($this->ende)";
    }
}
