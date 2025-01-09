<?php

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy;

use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Item;

class ConjuredItemStrategy implements ItemStrategy {
    public function updateQuality(Item $item): void {
        if ($item->quality > 0) {
            $item->quality = max(0, $item->quality - 2);
        }

        $item->sellIn--;

        if ($item->sellIn < 0 && $item->quality > 0) {
            $item->quality = max(0, $item->quality - 2);
        }
    }
}