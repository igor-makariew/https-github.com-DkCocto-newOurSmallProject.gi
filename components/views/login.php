<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


?>
<?php if(Yii::$app->user->isGuest): ?>

<div class="row-form">
    <div class="col-lg-form">
    
    <p>Please fill out the following fields to login: 111</p>

    <?php $form = ActiveForm::begin([
//        'id' => 'login-form',
        'action' => '/site/login', 
        ]); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => false, 'email']) ?>

        <?= $form->field($model, 'password')->passwordInput(['type' => 'password']) ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 form-group-form\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="form-group-form">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
        <div class="form-group-center">
            <?= Html::a('Регистрация', Url::to(['site/form-registration']))?>
        </div>    
    </div>
</div>

<?php else:?>
<?= $model->username; ?>
<?= Html::a('Выйти', Url::to(['/site/logout']))?>
<?php endif; ?>