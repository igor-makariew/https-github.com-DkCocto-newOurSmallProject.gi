<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ltAppAsset;
use yii\web\View;

AppAsset::register($this);
ltAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?= Html::cssFile(YII_DEBUG ? '@web/css/all.css' : '@web/css/all.min.css?v=' . filemtime(Yii::getAlias('@webroot/css/all.min.css'))) ?>
    <title><?= Html::encode($this->title) ?></title>
    
    <!-- Bootstrap -->
        
    <?php $this->head() ?>
  </head>
  <body>
      <?php $this->beginBody() ?>
        
	
        <!-- Responsive menu - START -->
	<?= $this->render('menu'); ?> 
        <!-- Responsive menu - END -->
        <?php if(Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) == TRUE ): ?>
            <div class="feature">
                <div class="breadcrumbs">
                        <h4><?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]); ?></h4>
                </div>
            </div>  
        <?php endif; ?>
        
        <?= $content; ?>	

	
	<!--start footer-->
	<?= $this->render('footer');?>
	<!--end footer-->
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
	<?php $this->registerJsFile('@web/js/wow.min.js', ['depends' => 'yii\web\YiiAsset'])?>
        <?php $this->endBody() ?>
        <?= Html::jsFile(YII_DEBUG ? '@web/js/lib.js' : '@web/js/lib.min.js?v=' . filemtime(Yii::getAlias('@webroot/js/lib.min.js'))) ?>
        <?= Html::jsFile(YII_DEBUG ? '@web/js/all.js' : '@web/js/all.min.js?v=' . filemtime(Yii::getAlias('@webroot/js/all.min.js'))) ?>
<!--    <script>
        Slider.prototype = {
        getGlobalWidth: function() {
        document.write (this.$element.width() + 0);
      }
      getGlobalWidth;
    </script> -->
      </body>
</html>
<?php $this->endPage() ?>
