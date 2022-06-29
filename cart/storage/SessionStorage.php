<?php

namespace app\cart\storage;

use yii\web\Session;

/**
 * Class SessionStorage
 * @package app\cart\storage
 */
class SessionStorage implements InterfaceStorageCart {
    /* @var $storage Session */
    private $key;
    /**
     * @var Session
     */
    private $storage;

    /**
     * SessionStorage constructor.
     * @param $key
     * @param Session $storage
     */
    public function __construct($key, Session $storage) {
        $this->key = $key;
        $this->storage = $storage;
    }

    /**
     * @param array $value
     */
    public function set(array $value) {
        $this->storage->set($this->key, $value);
    }

    /**
     * @return array
     */
    public function get(): array {
        return $this->storage->get($this->key, []);
    }
}
