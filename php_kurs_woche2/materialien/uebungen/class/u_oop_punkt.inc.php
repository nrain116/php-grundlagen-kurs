<?php



class Punkt
{
    public function __construct(private float $x = 0, private float $y = 0) {}


    public function verschieben(float $x, float $y)
    {
        $this->x += $x;
        $this->y += $y;
    }

    public function __toString(): string
    {
        return "$this->x / $this->y";
    }
}
