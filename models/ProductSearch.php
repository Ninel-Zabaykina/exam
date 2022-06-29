<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idUser', 'idCategory'], 'integer'],
            [['name', 'description', 'timestamp', 'status', 'photoBefore', 'price', 'reason'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'timestamp' => $this->timestamp,
            'idUser' => $this->idUser,
            'idCategory' => $this->idCategory,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'photoBefore', $this->photoBefore])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'reason', $this->reason]);

        $query->orderBy(['timestamp'=>SORT_DESC]);

        return $dataProvider;
    }

    public function searchForUser($params, $idUser)
    {
        $query = Product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'timestamp' => $this->timestamp,
            'idUser' => $this->idUser,
            'idCategory' => $this->idCategory,
        ]);

        $query->andWhere(['idUser'=>$idUser]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'photoBefore', $this->photoBefore])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'reason', $this->reason]);

        $query->orderBy(['timestamp'=>SORT_DESC]);

        return $dataProvider;
    }
}
