<?php

namespace app\cart\storage;

/**
 * Interface InterfaceStorageCart
 * @package app\cart\storage
 */
interface InterfaceStorageCart {
    /*Сохраняет значение в хранилище*/
    /**
     * @param array $value
     * @return mixed
     */
    public function set(array $value);
    /*Получает значение из хранилища*/
    /**
     * @return array
     */
    public function get(): array;
}
