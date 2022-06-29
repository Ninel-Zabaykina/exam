<?php


namespace app\cart;

use app\models\Product;

/**
 * Class CartItem
 * @package app\cart
 */
class CartItem {

    /**
     * @var Product
     */
    private $product;
    /**
     * @var
     */
    private $quantity;

    /**
     * CartItem constructor.
     * @param Product $products
     * @param $quantity
     */
    public function __construct(Product $products, $quantity)
    {
        $this->product = $products;
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return md5(serialize([$this->product->id]));
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->product->id;
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return $this->getPrice() * $this->quantity;
    }

    /**
     * @param $quantity
     * @return CartItem
     */
    public function plus($quantity): CartItem
    {
        return new static($this->product, $this->quantity + $quantity);
    }

    /**
     * @param $quantity
     * @return CartItem
     */
    public function changeQuantity($quantity): CartItem
    {
        return new static($this->product, $quantity);
    }
}
