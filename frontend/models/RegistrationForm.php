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
    public $password;

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
                    'password',
                    'bornDate',
                    'sex',
                ],
                'required', 'message' => 'Поле не должно быть пустым'
            ],
            ['email', 'email', 'message' => 'Email указан в неверном формате'],
            [
                [
                    'name',
                    'surname',
                    'login',
                    'password',
                ]
                , 'filter', 'filter' => 'strip_tags'
            ],
            ['accept', 'compare', 'compareValue' => '1', 'message' => 'Вы должны принять соглашение']
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
            'password' => 'Пароль',
            'bornDate' => 'Дата рождения',
            'sex'      => 'Пол',
            'town'     => 'Город',
            'accept'   => 'Согласие с условиями пользовательского соглашения',
        ];
    }
}
