<?php

namespace app\cart\decorator;

/**
 * Class ItemDecorator
 * @package app\cart\decorator
 */
abstract class ItemDecorator extends Item{

    /**
     * @var Item
     */
    protected $item;

    /**
     * ItemDecorator constructor.
     * @param Item $item
     */
    public function __construct(Item $item) {
        $this->item = $item;
    }
}
