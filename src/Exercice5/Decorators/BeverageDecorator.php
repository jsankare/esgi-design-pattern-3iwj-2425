<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5\Decorators;

use EdemotsCourses\EsgiDesignPattern\Exercice5\Beverage;

abstract class BeverageDecorator implements Beverage
{
    protected Beverage $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }
}
