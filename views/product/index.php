<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            'timestamp',
            'status',
            [
                'attribute' => 'id',
                'value' => function ($model){
                    return  Html::a('Посмотреть подробнее', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']);
                },
                'format' => 'raw',
            ],
            [
                'value' => function ($model){
                    return  Html::a('Добавить в корзину', ['cart/add', 'id' => $model->id], ['class' => 'btn btn-success']);
                },
                'format' => 'raw',
            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{cancel} {solve}',
                'buttons' => [
                    'cancel' => function ($url, $model) {
                        if ($model->status == 'В наличии') {
                            return Html::a('Отсутствует', ['/Product/cancel', 'id' => $model->id]);
                        }
                        return '';
                    },
                    'solve' => function ($url, $model) {
                        if ($model->status == 'В наличии') {
                            return Html::a('Под заказ', ['/Product/solve', 'id' => $model->id]);
                        }
                        return '';
                    }
                ]
            ],
        ],
    ]); ?>

</div>
