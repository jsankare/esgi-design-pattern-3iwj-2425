<?php

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

interface ItemStrategy {
    public function updateQuality(Item $item): void;
}

class NormalItemStrategy implements ItemStrategy {
    public function updateQuality(Item $item): void {
        if ($item->quality > 0) {
            $item->quality--;
        }

        $item->sellIn--;

        if ($item->sellIn < 0 && $item->quality > 0) {
            $item->quality--;
        }
    }
}

class AgedBrieStrategy implements ItemStrategy {
    public function updateQuality(Item $item): void {
        if ($item->quality < 50) {
            $item->quality++;
        }

        $item->sellIn--;

        if ($item->sellIn < 0 && $item->quality < 50) {
            $item->quality++;
        }
    }
}

class BackstagePassesStrategy implements ItemStrategy {
    public function updateQuality(Item $item): void {
        if ($item->quality < 50) {
            $item->quality++;

            if ($item->sellIn <= 10 && $item->quality < 50) {
                $item->quality++;
            }

            if ($item->sellIn <= 5 && $item->quality < 50) {
                $item->quality++;
            }
        }

        $item->sellIn--;

        if ($item->sellIn < 0) {
            $item->quality = 0;
        }
    }
}

class SulfurasStrategy implements ItemStrategy {
    public function updateQuality(Item $item): void {
        // Sulfuras never changes
    }
}

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