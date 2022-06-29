<?php

namespace app\controllers;

use app\models\ProductSearch;
use Yii;
use app\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class CatalogController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}

