<?php

/* @var $this View */
/* @var $item \app\cart\CartItem */
/* @var $model \app\cart\Cart */

use app\models\CartForm;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$cartForm = CartForm::instance();
$this->title = 'Корзина';

?>
<div class="container">
    <table width="100%" class="table table-hover">
        <thead>
        <tr class="text-center">
            <th>Название</th>
            <th>Количество</th>
            <th>Изменить?</th>
            <th>Цена</th>
            <th>Общая</th>
            <th>Удалить?</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($model->getItems() as $item): ?>
            <tr>
                <td><?= $item->getProduct()->name ?></td>
                <td><?= $item->getQuantity() ?></td>
                <td>
                    <div class="col-xs-3">
                        <?php $form = ActiveForm::begin([
                            'action' => ['/cart/plus']
                        ]); ?>
                        <?= $form->field($cartForm, 'id')->hiddenInput([
                            'value' => $item->getId()
                        ])->label(false); ?>
                        <?= $form->field($cartForm, 'quantity')->textInput([
                            'value' => $item->getQuantity()
                        ])->label(false); ?>
                        <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-info']); ?>
                        <?php ActiveForm::end();?>
                    </div>
                </td>
                <td><?= $item->getCost() ?></td>
                <td><?= Html::a('X', ['cart/remove', 'id' => $item->getId()], ['class' => 'btn btn-danger']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <hr/>
    <table width="100%" class="table table-condensed">
        <tr class="text-danger">
            <td>Всего на сумму</td>
            <td><?= $model->getPrice() ?></td>
        </tr>
    </table>
    <?php if ($model->getItems()):?>
        <table width="100%" class="table table-condensed">
            <tr class="text-danger">
                <td class="text-left">
                    <?= Html::a('Очистить корзину', ['cart/clear'], ['class' => 'btn btn-danger'])?>
                </td>
                <td class="text-right">
                    <?= Html::a('Совершить покупку', ['/'], ['class' => 'btn btn-success']); ?>
                </td>
            </tr>
        </table>
    <?php endif; ?>
</div>
