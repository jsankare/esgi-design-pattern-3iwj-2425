<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5\Beverages;

use EdemotsCourses\EsgiDesignPattern\Exercice5\Beverage;

class Expresso implements Beverage {
    public function getDescription(): string
    {
        return "Expresso";
    }

    public function getCost(): float
    {
        return 2.00;
    }
}