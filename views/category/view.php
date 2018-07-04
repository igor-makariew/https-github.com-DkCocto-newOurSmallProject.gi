<?php

//use yii\widgets\ListView;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\controllers\CustomController;
$this->title = $model->lesson;
$this->params['breadcrumbs'][] = ['label' => $model->category->title, 'url' => ['site/php-modules-list', 'categoryId' => $model->category->id]];
$this->params['breadcrumbs'][] = $this->title;

?>

<article class="box post post-excerpt">
    <div class="content">
    
        <div class="row">
            <header>
                <h2><?= Html::a($model->category->title, Url::to(['site/php-modules-list', 'id' => $category->id]))?></h2>
                    <p>A free, fully responsive HTML5 site template by HTML5 UP</p>
            </header>

            <div class="info">
                <span class="date"><span class="month">Урок </span> <span class="day"><?= $model->lesson ?> &nbsp;&nbsp;&nbsp;&nbsp; <?= $model->text ?>
                        <ul class="stats">
                            <li><span class="icon fa fa-eye"> &nbsp; <?= $model->views?></span></li>
                        </ul>
                    </span>    
                    <span class="year">
                        <?php $image = $model->getImage(); ?>
                            <?= Html::img($image->getUrl('400x640'), ['alt' => $model->title, ]) ?>
            <!--                <a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>-->
                             </span>
                </span>
            </div>

            
        </div> 
    </div>
</article>

    <!--Коментарии-->

    <div class="comments">
        <h3 class="title-comments">Комментарии</h3>
        <ul class="media-list">
            <!-- Комментарий (уровень 1) -->
            <?php foreach ($tree as $comm) : ?>
            <li class="media">
                <div class="media-left">

                        <span class="media-object img-rounded"> <i class="fa fa-comment-o" aria-hidden="true"></i> </span>

                </div>
                <div class="media-body">
                    <div class="media-heading">
                        <div class="author"><?= $comm['username'] ?></div>
                    </div>
                    <div class="media-text text-justify"><?= $comm['text'] ?></div>
                    <div class="footer-comment">
                        <span class="comment-reply">
                        <a href="#comment-text" class="reply" data-comment="<?= $comm['id'] ?>">ответить</a>
                        </span>
                    </div>

                    <!-- Вложенный медиа-компонент (уровень 2) -->
                    <?php if (isset($comm['childs'])) : ?>
                        <?php foreach ($comm['childs'] as $child) : ?>
                    <div class="media">
                        <div class="media-left">
                                <span class="media-object img-rounded"> <i class="fa fa-comments-o" aria-hidden="true"></i> </span>
                        </div>
                        <div class="media-body">
                            <div class="media-heading">
                                <div class="author"><?= $child['username'] ?></div>
                            </div>
                            <div class="media-text text-justify"><?= $child['text'] ?></div>
                            <!--<div class="footer-comment">

                                </span>
                                <span class="comment-reply">
                                <a href="#" class="reply">ответить</a>
                                </span>
                            </div>-->

                            <!-- Вложенный медиа-компонент (уровень 3) -->

                        </div>
                    </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <!-- Конец вложенного комментария (уровень 2) -->

                </div>
            </li>
            <!-- Конец комментария (уровень 1) -->
            <?php endforeach; ?>
        </ul>
        <div class="row">
            <div class="col-lg-5">
                
                <?php $form = ActiveForm::begin([
                    'method' => 'post',
//                    'action' => ['category/view']
                ]) ?>

                <?= $form->field($comment, 'parent_id')->hiddenInput(['value' => 0])->label(false); ?>

                <?= $form->field($comment, 'text')->textarea(['rows' => 6]); ?>

                <div class="form-group">
                    <?= Html::submitButton('Комментировать', ['class' => 'btn btn-primary']); ?>
                </div>
 
                <?php ActiveForm::end() ?>
            </div>
            
        </div>
    </div>
    
   



<!-- Пагинация начало -->
<!--<div class="row">
    <?php // ListView::widget([
//        'dataProvider' => $dataProvider,
//        'itemView' => '_list',
//        'layout' => "{items}\n{pager}",
        /*'summary' => '<div class="right-align">Кол-во уроков: {totalCount}</div>',*/
//    ]); ?>
</div>-->
<!--Пагинация конец-->
