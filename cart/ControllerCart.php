<?php

namespace app\cart;


/**
 * Class ControllerCart
 * @package app\cart
 */
class ControllerCart
{
    /**
     * @var Cart
     */
    private $cart;

    /**
     * ControllerCart constructor.
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * @return Cart
     */
    public function getCart(): Cart
    {
        return $this->cart;
    }

    /**
     * @param CartItem $items
     */
    public function addToCart(CartItem $items)
    {
        $this->cart->add($items);
    }

    /**
     * @param $id
     * @param $quantity
     */
    public function changeQuantity($id, $quantity)
    {
        if ($quantity <= 0){
            $quantity = 1;
        }
        $this->cart->changeQuantity($id, $quantity);
    }

    /**
     * @param $id
     */
    public function remove($id)
    {
        $this->cart->remove($id);
    }

    public function clear()
    {
        $this->cart->clear();
    }
}