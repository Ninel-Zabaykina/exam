<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="Product-item">
    <h2><?= Html::encode($model->header) ?></h2>
    <?= HtmlPurifier::process($model->text) ?>
</div>