<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;



$this->title = 'Registration';
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
?>

<div class="row-form">
    <div class="col-lg-form">
        <?php if(Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success" role="alert">
                <?= $model->password; ?>
                <?= $model->username; ?>
                <?= $model->email; ?>
                <?= $model->code; ?>
                <?= Yii::$app->session->getFlash('success')?>
            </div>
        <?php endif; ?>
        <?php if(Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= Yii::$app->session->getFlash('error')?>
            </div>
        <?php endif; ?>
    <?php $form = ActiveForm::begin(['id' => 'user']
//            'id' => 'form-registration',
//            'enableAjaxValidation' => true,
            ); ?>

        <?= $form->field($model, 'email')->input('email') ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]); ?>
        <?= $form->field($model, 'password')->textInput(['type' => 'password']) ?>
        
        <div class="form-group-form">
            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
<!-- site-form_registration -->
