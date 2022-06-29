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
class ProductCreateForm extends Product
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'idCategory', 'photoBefore'], 'required'],
            [['description', 'status'], 'string'],
            [['timestamp'], 'safe'],
            [['idUser', 'idCategory', 'price'], 'integer'],
            [['photoBefore'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, bmp', 'maxSize' => 10*1024*1024],
            [['name'], 'string', 'max' => 255],
            [['idCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['idCategory' => 'id']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
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

    public function upload()
    {
        if ($this->validate()) {
            $dir = 'web/uploads/';
            $name = $this->randomFileName($this->photoBefore->extension);
            $file = $dir . $name;
            $this->photoBefore->saveAs($file);
            return true;
        } else {
            return false;
        }
    }

    private function randomFileName($extension = false)
    {
        $extension = $extension ? '.' . $extension : '';
        do {
            $name = md5(microtime() . rand(0, 1000));
            $file = $name . $extension;
        } while (file_exists($file));
        return $file;
    }
}
