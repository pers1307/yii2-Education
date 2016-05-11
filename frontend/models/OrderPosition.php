<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "order_position".
 *
 * @property integer $id
 * @property integer $count
 * @property integer $id_product
 *
 * @property Products $idProduct
 * @property Orders[] $orders
 */
class OrderPosition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['count', 'id_product'], 'integer'],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['id_product' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'count' => 'Count',
            'id_product' => 'Id Product',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'id_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['id_position' => 'id']);
    }
}
