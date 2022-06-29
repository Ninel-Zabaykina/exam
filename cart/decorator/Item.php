<?php

namespace app\cart\decorator;

/**
 * Class Item
 * @package app\cart\decorator
 */
abstract class Item{
    /**
     * @param array $items
     * @return int
     */
    abstract public function getPrice(array $items): int;
}