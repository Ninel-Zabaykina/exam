<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Product */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать заявку', ['create'], ['class' => 'btn btn-success сol-btn']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            'status',
            //'photoBefore',
            //'price',
            //'reason:ntext',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view}, {delete}', ],
        ],
    ]); ?>
</div>
