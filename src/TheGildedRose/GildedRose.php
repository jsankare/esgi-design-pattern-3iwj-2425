<?php

declare(strict_types=1);

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy\AgedBrieStrategy;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy\BackstagePassesStrategy;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy\ConjuredItemStrategy;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy\ItemStrategy;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy\NormalItemStrategy;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy\SulfurasStrategy;

final class GildedRose
{
    private array $strategies;

    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
        $this->strategies = [
            'Aged Brie' => new AgedBrieStrategy(),
            'Backstage passes to a TAFKAL80ETC concert' => new BackstagePassesStrategy(),
            'Sulfuras, Hand of Ragnaros' => new SulfurasStrategy(),
            'Conjured Mana Cake' => new ConjuredItemStrategy(),
        ];
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $strategy = $this->getStrategy($item);
            $strategy->updateQuality($item);
        }
    }

    private function getStrategy(Item $item): ItemStrategy
    {
        return $this->strategies[$item->name] ?? new NormalItemStrategy();
    }
}