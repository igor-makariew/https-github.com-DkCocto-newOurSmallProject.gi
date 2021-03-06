<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;



$this->title = 'Registration';
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form ActiveForm */
?>

<div class="row-form">
    <div class="col-lg-form">
        <?php if(Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success" role="alert">
                 <?= Yii::$app->session->getFlash('success')?>
            </div>
        <?php endif; ?>
        <?php if(Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= Yii::$app->session->getFlash('error')?>
            </div>
        <?php endif; ?>
    <?php $form = ActiveForm::begin([
            'id' => 'form-registration',
            'enableAjaxValidation' => false,
            ]); ?>

        <?= $form->field($model, 'email')->input('email') ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => false]); ?>
        <?= $form->field($model, 'password')->textInput(['type' => 'password']) ?>
        
        <div class="form-group-form">
            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
<!-- site-form_registration -->
