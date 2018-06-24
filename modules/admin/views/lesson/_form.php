<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Lesson */
/* @var $form yii\widgets\ActiveForm */
$promt = ['prompt' => 'Выберете категорию урока'];
?>

<div class="lesson-form">

    <?php $form = ActiveForm::begin([
//        'method' => 'post',
//        'action' => '/admin/lesson/create',
    ]); ?>

    <?= $form->field($model, 'idCategory')->dropDownList($category, $promt) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lesson')->textInput() ?>

    <?=  $form->field($model, 'text')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);
    ?>

    <?= $form->field($model, 'video')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'views')->textInput() ?>
    
    <?= $form->field($model, 'image')->fileInput()?> 

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
