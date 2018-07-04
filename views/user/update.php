<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['view']];
$this->params['breadcrumbs'][] = $this->title;
?>

<article class="box post post-excerpt">
    <div class="col-lg-12">
        <div class="col-lg-4">
            <?php //$noavatar = $model->find()->where(['urlAlias' => 'noavatar'])  ?>
            <?php //var_dump($noavatar); ?>
            <?php $image = $model->getImage(); ?>
            <?php if($image): //app\controllers\CustomController::printr($image)?>
                <?=  Html::img($image->getUrl('250x250'), ['alt' => $model->username, 'class' => 'imagefeatured']); ?>
            <?php else:?>
                <?php //$image = $noavatar->getImage(); ?>
                <?php //Html::img($image->getUrl('250x250'), ['alt' => $model->username, 'class' => 'imagefeatured']); ?>
            <?php endif;?>
        <a href="#" class="delFoto" data-id="<?= $model->id ?>" data-img="<?= $image->id ?>">Удалить аватар</a>
        </div>
        <div class="col-lg-8">
            <?= $this->render('_form', compact('model')) ?>
        </div>
    </div>

</article>

