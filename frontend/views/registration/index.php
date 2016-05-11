<?
use yii\helpers\Html;
?>

<h3>Форма регистрации!</h3>

<? $form = \yii\widgets\ActiveForm::begin([
    'id'     => 'RegistrationForm',
    'action' => '/registration/',
    'method' => 'post'
]) ?>

    <div class="row">
        <div class="col-sm-5">
            <?= $form->field($model, 'name',
                [
                    'template' =>
                        '
                            {input}
                            {error}
                        ',
                    'options' => ['class' =>'has-feedback']
                ]
            )
                ->label(false)
                ->textInput(['class' => 'form-control', 'placeholder' => 'Имя'])
                ->hint(false)
            ?>

            <?= $form->field($model, 'surname',
                [
                    'template' =>
                        '
                            {input}
                            {error}
                        ',
                    'options' => ['class' =>'has-feedback']
                ]
            )
                ->label(false)
                ->textInput(['class' => 'form-control', 'placeholder' => 'Фамилия'])
                ->hint(false)
            ?>

            <?= $form->field($model, 'email',
                [
                    'template' =>
                        '
                            {input}
                            {error}
                        ',
                    'options' => ['class' =>'has-feedback']
                ]
            )
                ->label(false)
                ->textInput(['class' => 'form-control', 'placeholder' => 'Email'])
                ->hint(false)
            ?>

            <?= $form->field($model, 'login',
                [
                    'template' =>
                        '
                            {input}
                            {error}
                        ',
                    'options' => ['class' =>'has-feedback']
                ]
            )
                ->label(false)
                ->textInput(['class' => 'form-control', 'placeholder' => 'Логин'])
                ->hint(false)
            ?>

            <?= $form->field($model, 'password',
                [
                    'template' =>
                        '
                            {input}
                            {error}
                        ',
                    'options' => ['class' =>'has-feedback']
                ]
            )
                ->input('password')
                ->label(false)
                ->passwordInput(['class' => 'form-control', 'placeholder' => 'Пароль'])
                ->hint(false)
            ?>

            <?= $form->field($model, 'sex',
                [
                    'template' =>
                        '
                            {label}
                            {input}
                            {error}
                        ',
                ]
            )
                ->radioList([
                    '1' => 'Муж',
                    '0' => 'Жен',
                ])
                ->label('Пол')
            ?>

            <?= $form->field($model, 'bornDate',
                [
                    'template' =>
                        '
                            {label}
                            {input}
                            {error}
                        ',
                ]
            )
            ->widget(\kartik\date\DatePicker::className())

            ?>

            <?= $form->field($model, 'town',
                [
                    'template' =>
                        '
                            {label}
                            {input}
                            {error}
                        ',
                    'options' => ['class' =>'has-feedback']
                ]
            )
                ->dropDownList([
                    'Moscow' => 'Москва',
                    'Peterburg' => 'Питер',
                    'Ekaterinburg' => 'Екатеринбург',
                ])
            ?>

            <div class="row">
                <p></p>
            </div>

            <?= $form->field($model, 'accept',
                [
                    'template' =>
                        '
                            {label}
                            {input}
                            {error}
                        ',
                    'options' => ['class' =>'has-feedback']
                ]
            )
                ->checkbox()
            ?>

        </div>

        <div class="row"></div>

        <div class="col-xs-2">
            <?=  Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
        </div>

    </div>

<? \yii\widgets\ActiveForm::end() ?>