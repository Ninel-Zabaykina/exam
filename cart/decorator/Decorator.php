<?php

namespace app\cart\decorator;

/**
 * Class StaticDecorator
 * @package app\cart\decorator
 */
class Decorator extends ItemDecorator
{
    /**
     * @param array $items
     * @return int
     */
    public function getPrice(array $items): int
    {
        return $this->item->getPrice($items);
    }
}