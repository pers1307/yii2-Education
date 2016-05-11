<?php

namespace frontend\controllers;

use common\models\User;
use frontend\models\Profile;
use frontend\models\RegistrationForm;
use frontend\models\User2;
use yii\db\Connection;

class RegistrationController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new RegistrationForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $user = new User2();

            // Ручная перекладка
            $profile = new profile();

            $profile->sex = $model->sex;
            $profile->born_date = $model->bornDate;

            $profile->save();

            $user->email = $model->email;

            $user->link('profile', $profile);
            $user->save();

            $this->redirect('/registration/succes/');
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


        /**
         * $customer = Customers::findOne(1);
         */
        return $this->render('index', [
            'model'   => $model
        ]);
    }

    public function actionReg()
    {
        $model = new User2();

        $model_profile = new Profile();

        if ($model->load(\Yii::$app->request->post())) {

            if ($model->validate()) {
                //$profile = new profile();
                $model_profile->load(\Yii::$app->request->post());
                $model_profile->save();

                //$model_profile->save();

                $model->link('profile', $model_profile);
                $model->save();
            }
        }

        return $this->render('reg', [
            'model' => $model,
            'model_profile' => $model_profile
        ]);
    }

    public function actionSucces()
    {
        return $this->render('succes', []);
    }
}
