<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Авторизация';
?>

<h2 class="login-title">Login to Account</h2>
<p class="login-subtitle">Please enter your email and password to continue</p>

<?php $form = ActiveForm::begin([
    'options' => ['class' => 'login-form-content']
]); ?>


    <?= $form->field($model, 'email')
        ->textInput([
            'class' => 'form-control',
            'placeholder' => 'Enter Email',
            'autofocus' => true
        ])
        ->label('Email address', ['class' => 'form-control-label']) ?>



    <?= $form->field($model, 'password')
        ->passwordInput([
            'class' => 'form-control',
            'placeholder' => 'Enter Password'
        ])
        ->label('Password', ['class' => 'form-control-label']) ?>



    <?= $form->field($model, 'rememberMe')->checkbox([
        'class' => 'form-check-input'
    ]) ?>

    <div class="form-buttons">
         <?= Html::submitButton('Sign In', [
            'class' => 'button button-primary',
            'name' => 'login-button'
        ]) ?>
            
        <?= Html::a('Back to Home', ['site/index'], [
            'class' => 'button button-secondary',
        ]) ?>
    </div>

<?php ActiveForm::end(); ?>