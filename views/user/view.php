<?php

use yii\helpers\Url;
use yii\helpers\Html;
//use Yii;

//$this->title = $model->title;
// 
$this->params['breadcrumbs'][] = $this->title;
?>

<article class="box post post-excerpt">
    <div class="col-lg-12">
        <div class="col-lg-4">
            <?php //$noavatar = $model->find()->where(['urlAlias' => 'noavatar'])  ?>
            <?php //app\controllers\CustomController::printr($model);?>
            <?php $image = $model->getImage(); ?>
            <?php if($image): //app\controllers\CustomController::printr($image)?>
                <?=  Html::img($image->getUrl('250x250'), ['alt' => $model->username, 'class' => 'imagefeatured']); ?>
            <?php else:?>
                <?php //  Html::img($noavatar->getUrl('250x250'), ['alt' => $model->username, 'class' => 'imagefeatured']); ?>
            <?php endif;?>
        </div>
        <div class="col-lg-8">
            <p>Статус: <?= Yii::$app->user->can('admin') ? 'Администратор' : 'Пользователь' ?> </p>
            <p>Имя: <?= $model->username ?> </p>
            <p>E-mail: <?= $model->email ?> </p>
        </div>
        <div class="col-lg-4">
            <a href="<?= Url::to(['user/update'])?>">Редактировать профиль </a>
            <a href="<?= Url::to(['user/replacement'])?>">Изменить пароль</a>
        </div>
    </div>

</article>

