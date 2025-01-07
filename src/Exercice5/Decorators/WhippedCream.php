<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5\Decorators;

class WhippedCream extends BeverageDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ", WhippedCream";
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 1.00;
    }
}
