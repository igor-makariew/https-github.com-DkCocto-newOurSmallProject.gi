<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use app\components\LoginWidget;


$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(Yii::$app->user->isGuest): ?>
    <div class="col-lg-12">
        <div class="col-lg-form">

        <p>Please fill out the following fields to login:</p>

        <?php $form = ActiveForm::begin([
//            'id' => 'login-form',
            'layout' => 'horizontal',
            'action' => '/site/login',
            ]); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => false]) ?>

            <?= $form->field($model, 'password')->passwordInput(['type' => 'password']) ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"col-lg-offset-1 form-group-form\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>
            <div class="text-right"><a href="<?= Url::to(['/site/restore']) ?>">Забыли пароль ?</a></div>
            <div class="form-group">
                <div class="form-group-form">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>
            <div class="form-group-center">
                Первый раз у нас ?
                <?= Html::a('Регистрация', Url::to(['/site/form-registration']))?>
            </div> 

            <div class="col-lg-offset-1" style="color:#999;">
                You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
                To modify the username/password, please check out the code <code>app\models\User::$users</code>.
            </div>
        </div>
    </div>

<?php else:?>
    <?= $image = $model->getImage(); ?>
<a href="<?= Url::to(['user/view'])?>"><?php // Html::img($image->getUrl('150x150'), ['alt' => $model->username]); ?>
    <p>Добро пожаловать: <?= $model->username; ?></p>
    <a href="<?= Url::to(['user/view']); ?>">Личный кабинет</a>
    <?php if (Yii::$app->user->can('admin')) : ?>
        <br>
        <?= Html::a('Администратор', Url::to(['/admin/ '])/*, $options = []*/ ) ?>

    <?php endif; ?>
        <br>
        <?= Html::a('Выйти', Url::to(['/site/logout'])/*, $options = []*/ ) ?>
<?php endif; ?>

<div class="center-block"><?= LoginWidget::widget(); ?><div>


    




    