<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['view']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="lesson-form">

    <?php $form = ActiveForm::begin([
//        'method' => 'post',
//        'action' => '/admin/lesson/create',
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true ]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput()?> 

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>