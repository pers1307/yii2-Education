<?php

namespace frontend\controllers;

use common\models\User;
use frontend\models\profile;
use frontend\models\RegistrationForm;
use frontend\models\User2;
use yii\db\Connection;

class RegistrationController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new RegistrationForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

        }

//        $db = new Connection(
//            [
//                'dns' => 'mysql:host=localhost;dbname=',
//                'username' => 'root',
//                'password' => '',
//                'charset' => 'utf8',
//            ]
//        );
//
//        $db2 = new Connection(
//            [
//                'dns' => 'mysql:host=localhost;dbname=',
//                'username' => 'root',
//                'password' => '',
//                'charset' => 'utf8',
//            ]
//        );
//
//        $posts = $db->createCommand('SELECT * FROM post WHERE id=:id')
//            ->bindValue([':id' => $id])
//            ->queryAll();
//
//        $posrt2 = $db->createCommand()->insert('user', ['login' => 'nick'])
//            ->execute();
//
//        $posrt3 = $db->createCommand()->delect()
//            ->execute();

        //$user = new User::find_all();
        //$user = User::find_all();





        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionReg()
    {
        //$model = new frontend\models\User2();

        $model = new User2();

        $model_profile = new profile();

        if ($model->load(\Yii::$app->request->post())) {

            if ($model->validate()) {
                $profile = new profile();
                $profile->load(\Yii::$app->request->post());
                $profile->save();

                //$model_profile->save();

                $model->link('profile', $profile);
                $model->save();
            }
        }

        return $this->render('reg', [
            'model' => $model,
            'model_profile' => $model_profile
        ]);
    }



}
