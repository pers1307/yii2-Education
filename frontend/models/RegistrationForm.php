<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Class RegistrationForm
 * @package frontend\models
 */
class RegistrationForm extends Model
{
    /**
     * @var
     */
    public $name;

    /**
     * @var
     */
    public $surname;

    /**
     * @var
     */
    public $email;

    /**
     * @var
     */
    public $login;

    /**
     * @var
     */
    public $bornDate;

    /**
     * @var
     */
    public $sex;

    /**
     * @var
     */
    public $accept;

    /**
     * @var
     */
    public $town;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [
                [
                    'name',
                    'surname',
                    'email',
                    'login',
                    'bornDate',
                    'sex',
                    'accept'
                ],
                'required', 'message' => 'Поле не должно быть пустым'
            ],
            ['email', 'email', 'message' => 'Email указан в неверном формате'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name'     => 'Имя',
            'surname'  => 'Фамилия',
            'email'    => 'Email',
            'login'    => 'Логин',
            'bornDate' => 'Дата рождения',
            'sex'      => 'Пол',
            'town'     => 'Город',
            'accept'   => 'Согласие с условиями пользовательского соглашения',
        ];
    }
}
