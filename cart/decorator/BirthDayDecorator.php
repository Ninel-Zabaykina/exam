<?php

namespace app\cart\decorator;


/**
 * Class BirthDayDecorator
 * @package app\cart\decorator
 */
class BirthDayDecorator extends Decorator
{
    /**
     * @param array $item
     * @return int
     */
    public function getPrice(array $item): int
    {
        return (\Yii::$app->user->identity->admin === '1') ? $this->item->getPrice($item) - ($this->item->getPrice($item) * 10 / 100) :
            $this->item->getPrice($item);
    }
}