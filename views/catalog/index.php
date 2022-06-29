<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Product */

$this->title = 'Каталог';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'name',
                'label'=>'Название',],
            //'id',
            //'name',
            ['attribute'=>'description',
                'label'=>'Описание',],
            'timestamp',
            //'idUser',
            //'idCategory',
            [
                'attribute'=>'idCategory',
                'value'=>'category.name',
            ],
            [
                'format' => 'image',
                'value' => function ($model) {
                    return $model->getImageUrl();
                },
                'options' => ['width' => '50']
            ],
            'status',
            //'photoBefore',
            //'price',
            //'reason:ntext',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view}, {delete}', ],
        ],
    ]); ?>
</div>
