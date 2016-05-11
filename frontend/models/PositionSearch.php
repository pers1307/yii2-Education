<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\OrderPosition;

/**
 * PositionSearch represents the model behind the search form about `frontend\models\OrderPosition`.
 */
class PositionSearch extends OrderPosition
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'count', 'id_product'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = OrderPosition::find();
//        $query = OrderPosition::find()
//            ->select('order_position.id, order_position.count, products.name as name')
//            ->leftJoin('products', '`order_position`.`id_product` = `products`.`id`');

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
            'count' => $this->count,
            'id_product' => $this->id_product,
            //'name' => 'name',
        ]);

        return $dataProvider;
    }
}
