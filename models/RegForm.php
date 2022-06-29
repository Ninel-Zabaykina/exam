<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $admin
 *
 * @property Product[] $Products
 */
class RegForm extends User
{
    public $passwordConfirm;
    public $agree;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'match', 'pattern'=>'/^[А-Яа-я\-\s]/u', 'message'=>'только кириллица, пробел и дефис'],
            [['surname'], 'match', 'pattern'=>'/^[А-Яа-я\-\s]/u', 'message'=>'только кириллица, пробед и дефис'],
            [['patronymic'], 'match', 'pattern'=>'/^[А-Яа-я\-\s]/u', 'message'=>'только кириллица, пробед и дефис'],
            [['login'], 'match', 'pattern'=>'/^[A-Za-z]{1,}/u','message'=>'только латинские буквы'],
            [['login'], 'unique','message'=>'такой логин уже используется'],
            [['email'],'email', 'message'=>'некорректный email'],
            [['password'], 'string','min'=>2, 'max'=>10],
            [['passwordConfirm'], 'compare', 'compareAttribute'=>'password', 'message'=>'пароли должны совпадать'],
            [['agree'],'boolean'],
            [['agree'],'compare', 'compareValue'=>true, 'message'=>'необходимо согласие на обработку персональных данных']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'fio' => 'Fio',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Password',
            'passwordConfirm' => 'PasswordConfirm',
            'agree' => 'Accept',
            //'admin' => 'Admin',
        ];
    }
}
