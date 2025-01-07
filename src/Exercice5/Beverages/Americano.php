<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5\Beverages;

use EdemotsCourses\EsgiDesignPattern\Exercice5\Beverage;

class Americano implements Beverage {
    public function getDescription(): string
    {
        return "Americano";
    }

    public function getCost(): float
    {
        return 2.50;
    }
}