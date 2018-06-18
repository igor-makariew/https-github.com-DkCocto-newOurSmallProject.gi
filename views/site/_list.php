<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<article class="box post post-excerpt">
    <div class="content">
    
        <div class="row">
            <header>
                <h2><?= Html::a( $model->title, Url::to(['category/php-modules-list', 'id' => $model->id]))?></h2>
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

