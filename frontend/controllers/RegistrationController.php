<?php

namespace frontend\controllers;

use frontend\models\RegistrationForm;

class RegistrationController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new RegistrationForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

        }

        return $this->render('index', [
            'model' => $model
        ]);
    }

}
