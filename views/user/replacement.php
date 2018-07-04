<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

//$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['view']];
//$this->params['breadcrumbs'][] = $this->title;
?>

<article class="box post post-excerpt">
    <div class="col-lg-12">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin()?>

            <?php // $form->field($model, 'password')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end() ?>
        </div>
        <div class="col-lg-3"></div>

    </div>

</article>

