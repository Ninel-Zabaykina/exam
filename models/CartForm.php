<?php

namespace app\models;

use yii\base\Model;

class CartForm extends Model
{
    public $quantity;
    public $id;

    public function rules(): array
    {
        return [
            [['quantity', 'id'], 'required'],
            [['quantity'], 'integer'],
        ];
    }
}