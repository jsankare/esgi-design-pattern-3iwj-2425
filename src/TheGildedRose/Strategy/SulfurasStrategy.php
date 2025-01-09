<?php

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy;

use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Item;

class SulfurasStrategy implements ItemStrategy {
    public function updateQuality(Item $item): void {
        // Sulfuras never has to be sold or decreases in Quality == No changes
    }
}