<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $id_position
 * @property string $all_sum
 * @property string $date_created
 *
 * @property OrderPosition $idPosition
 * @property User2 $user
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'id_position'], 'integer'],
            [['all_sum'], 'number'],
            [['date_created'], 'safe'],
            [['id_position'], 'exist', 'skipOnError' => true, 'targetClass' => OrderPosition::className(), 'targetAttribute' => ['id_position' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User2::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'id_position' => 'Id Position',
            'all_sum' => 'All Sum',
            'date_created' => 'Date Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPosition()
    {
        return $this->hasOne(OrderPosition::className(), ['id' => 'id_position']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User2::className(), ['id' => 'user_id']);
    }
}
