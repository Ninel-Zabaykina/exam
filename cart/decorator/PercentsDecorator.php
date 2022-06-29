<?php

namespace app\cart\decorator;

/**
 * Class PercentsDecorator
 * @package app\cart\decorator
 */
class PercentsDecorator extends Decorator {
    /**
     * @param array $item
     * @return int
     */
    public function getPrice(array $item): int
    {
        return $this->item->getPrice($item) - ($this->item->getPrice($item) * 5 / 100);
    }
}
