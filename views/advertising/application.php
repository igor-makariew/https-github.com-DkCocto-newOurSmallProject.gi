<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Для рекламодателей';
//$this->params['breadcrumbs'][] = ['label' => $model->category->title, 'url' => ['site/php-modules-list', 'categoryId' => $model->category->id]];
$this->params['breadcrumbs'][] = $this->title;

$prompt = ['prompt' => 'Выберете кол-во месяцев'];

var_dump($model->text);
?>

<div class="row">
    <div class="col-lg-3">
        <p>
            Заполните форму для отправки сообщение.
        </p>
    </div>    
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin([
                    'method' => 'post',
                    'id' => 'contact-form' // идентификатор формы
                    ]); ?>

                    <?php //  $form->field($model, 'text')->textarea([
//                        'autofocus' => true,
//                        ]) ?>

                    <?php //  $form->field($model, 'link')->textInput() ?>

                    <?php // $form->field($model, 'month')->dropDownList([
//                        '1' => '1 месяц',
//                        '3' => '3 месяца',
//                        '6' => '6 месяцев',
//                        '12' => '12 месяцев',
//                    ]) ?>

                    <?php // $form->field($model, 'verifyCode')->widget(Captcha::className(), [
//                        'template' => '<div class="row">'
//                        . '<div class="col-lg-3">{image}</div>'
//                        . '<div class="col-lg-6">{input}</div>'
//                        . '</div>',
//                    ],
//                        $promt  
//                    )
                    ?>
                    <?php //  $form->field($model, 'image')->fileInput() ?>    

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
