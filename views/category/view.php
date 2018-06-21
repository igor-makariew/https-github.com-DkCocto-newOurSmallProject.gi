<?php

use yii\widgets\ListView;

?>

<div class="row">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_list',
        'layout' => "{items}\n{pager}",
        /*'summary' => '<div class="right-align">Кол-во уроков: {totalCount}</div>',*/
    ]); ?>
</div>

