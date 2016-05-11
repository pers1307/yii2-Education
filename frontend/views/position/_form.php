<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\OrderPosition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-position-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?=
    $form->field($model, 'id_product')->widget(\kartik\select2\Select2::classname(), [
        'data' => $products,
        'language' => 'ru',
        'options' => ['placeholder' => 'Выберете продукт'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Продукт')

    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
