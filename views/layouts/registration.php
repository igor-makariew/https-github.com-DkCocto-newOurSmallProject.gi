<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

?>


<div class="container">
        <div class="row">
            <div class="col-lg-5">

                <?php

                    Modal::begin([
                        'header' => '<h3>Регистрация</h3>',
                           'toggleButton' => [
                               'label' => 'Регистрация',
                               'tag' => 'button',
                               'class' => 'btn btn-success'
                           ],
                            'footer' => 'Низ окна',
                        ]);
                     echo 'Say hello...';

                ?>
                    <div class="site-form_registration reg">

                        <?php $form = ActiveForm::begin([
                            'id' => 'registration',
                            'enableAjaxValidation' => true
                        ]); ?>

                            <?= $form->field($model, 'email')->textInput() ?>
                            <?= $form->field($model, 'username')->textInput() ?>
                            <?= $form->field($model, 'password')->textInput() ?>
                            
                            <div class="form-group">
                                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-success']) ?>
                            </div>
                        <?php ActiveForm::end(); ?>

</div><!-- site-form_registration -->

                <?php Modal::end(); ?>

            </div>     
        </div>
</div>
	
	