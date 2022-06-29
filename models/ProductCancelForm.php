<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $timestamp
 * @property int $idUser
 * @property int $idCategory
 * @property string|null $status
 * @property string $photoBefore
 * @property int $price
 * @property string $reason
 *
 * @property Category $idCategory0
 * @property User $idUser0
 */
class ProductCancelForm extends Product
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reason'], 'required'],
            /*[['description', 'status'], 'string'],
            [['timestamp'], 'safe'],
            [['idUser', 'idCategory'], 'integer'],
            [['photoBefore'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, bmp', 'maxSize' => 10*1024*1024],
            [['name', 'price'], 'string', 'max' => 255],
            [['idCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['idCategory' => 'id']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],*/
        ];
    }
}

