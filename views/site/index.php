<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <div style="text-align: center">
            <?php Pjax::begin(); ?>
            <?= Html::a("Каталог", ['catalog/index'], ['class' => 'btn btn-large btn-info', 'style'=>'width: 250px; margin: 15px;']) ?>
            <?php Pjax::end(); ?>
        </div>
    </div>

    <div class="body-content">

        <div class="row">

            <div id="myCarousel" class="carousel slide">

                <!-- Carousel items -->
                <div class="carousel-inner">
                    <?php
                    /* @var \app\models\Product[] $Products */
                    foreach ($Products as $index => $Product):
                        if ($index == 0) { ?>
                            <div class="active item">
                       <?php } else { ?>
                                <div class="item">
                                    <?php } ?>


                            <h2 style="text-align: center;"><?= $Product->name ?></h2>
                            <img
                                    class="img-responsive"
                                    style=" height: 500px; margin-right: auto; margin-left: auto;"
                                    src="web/uploads/<?= $Product->photoBefore ?>"
                                    alt="<?= $Product->name ?>"
                                    data-after="web/uploads/<?= $Product->price ?>"
                                    data-before="web/uploads/<?= $Product->photoBefore ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- Carousel nav -->
                <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>

        </div>
    </div>

    <script>

        function updateCounter () {
            $.ajax({
                dataType: 'text',
                url: '<?=Url::toRoute(['/site/counter'])?>',
                type: 'get',
                success: function (res) {
                    $('#counter').html('Решено задач: ' + res);
                }
            });
        }

        setInterval(function () {
            updateCounter();
        }, 3000);
    </script>
