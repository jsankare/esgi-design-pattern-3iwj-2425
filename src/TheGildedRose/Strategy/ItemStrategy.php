<?php

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy;

use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Item;

interface ItemStrategy {
    public function updateQuality(Item $item): void;
}