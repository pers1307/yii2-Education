<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Positions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-position-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Order Position', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Идентификатор',
                'format' => 'raw',
                'value' => function($data){
                    return $data->id;
                }
            ],
            [
                'label' => 'Количество',
                'format' => 'raw',
                'value' => function($data){
                    return $data->count;
                }
            ],
            [
                'label' => 'Продукт',
                'format' => 'raw',
                'value' => function($data){

                    // Лезем в базу!
                    $product = \frontend\models\Product::findOne($data->id_product);

                    return $product->name;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
