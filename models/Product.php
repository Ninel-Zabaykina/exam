<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

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
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'idUser', 'idCategory', 'photoBefore', 'price', 'reason'], 'required'],
            [['description', 'status', 'reason'], 'string'],
            [['timestamp'], 'safe'],
            [['idUser', 'idCategory', 'price'], 'integer'],
            [['name', 'photoBefore'], 'string', 'max' => 255],
            [['idCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['idCategory' => 'id']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'timestamp' => 'Timestamp',
            'idUser' => 'Id User',
            'idCategory' => 'Id Category',
            'status' => 'Status',
            'photoBefore' => 'Photo Before',
            'price' => 'Цена',
            'reason' => 'Reason',
        ];
    }

    /**
     * Gets query for [[IdCategory0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'idCategory']);
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }

    public function getImageUrl()
    {
        return Url::to('@web/web/uploads/' . $this->photoBefore, true);
    }
}
