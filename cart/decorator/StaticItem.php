<?php

namespace app\cart\decorator;

use app\cart\CartItem;

/**
 * Class StaticItem
 * @package app\cart\decorator
 */
class StaticItem extends Item
{
    /**
     * @param array $items
     * @return int
     */
    public function getPrice(array $items): int
    {
        $cost = 0;
        /* @var $item CartItem */
        foreach ($items as $item) {
            $cost += $item->getCost();
        }
        return $cost;
    }
}