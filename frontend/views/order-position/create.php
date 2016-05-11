<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\OrderPosition */

$this->title = 'Create Order Position';
$this->params['breadcrumbs'][] = ['label' => 'Order Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-position-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
