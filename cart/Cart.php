<?php

namespace app\cart;

use app\cart\decorator\Decorator;
use app\cart\storage\InterfaceStorageCart;

/**
 * Class Cart
 * @package app\cart
 */
class Cart{

    /**
     * @var InterfaceStorageCart
     */
    private $storage;
    /**
     * @var array [CartItem]
     */
    private $items;
    /**
     * @var Decorator
     */
    private $decorator;

    /**
     * Cart constructor.
     * @param InterfaceStorageCart $storage
     * @param Decorator $decorator
     */
    public function __construct(InterfaceStorageCart $storage, Decorator $decorator) {
        $this->storage = $storage;
        $this->decorator = $decorator;
    }

    /**
     * @return array
     */
    public function getItems(): array {
        $this->loadItems();
        return $this->items;
    }

    private function saveItems() {
        $this->storage->set($this->items);
    }

    private function loadItems() {
        if($this->items === NULL){
            $this->items = $this->storage->get();
        }
    }

    /**
     * @return int
     */
    public function getPrice(): int {
        $this->loadItems();
        return $this->decorator->getPrice($this->items);
    }

    /**
     * @param CartItem $products
     */
    public function add(CartItem $products) {
        /* @var $current CartItem */
        $this->loadItems();
        foreach ($this->items as $i => $current) {
            if ($current->getId() === $products->getId()) {
                $this->items[$i] = $current->plus($products->getQuantity());
                $this->saveItems();
                return;
            }
        }
        $this->items[] = $products;
        $this->saveItems();
    }

    /**
     * @param $id
     * @param $quantity
     */
    public function changeQuantity($id, $quantity)
    {
        /* @var $current CartItem */
        $this->loadItems();
        foreach ($this->items as $i => $current) {
            if ($current->getId() === $id) {
                $this->items[$i] = $current->changeQuantity($quantity);
                $this->saveItems();
                return;
            }
        }

        throw new \DomainException('Елемент не найден!');
    }

    /**
     * @param $id
     */
    public function remove($id)
    {
        /* @var $current CartItem */
        $this->loadItems();
        foreach ($this->items as $i => $current) {
            if ($current->getId() === $id) {
                unset($this->items[$i]);
                $this->saveItems();
                return;
            }
        }

        throw new \DomainException('Елемент не найден!');
    }

    public function clear()
    {
        $this->items = [];
        $this->saveItems();
    }
}
