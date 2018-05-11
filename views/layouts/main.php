<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\LtAppAsset;

AppAsset::register($this);
LtAppAsset::register($this);

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--    [if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
  </head>
  <body>
    <?php $this->beginBody() ?>  
    
    <!-- Responsive registration - START -->
	
    <!-- Responsive registration - END -->  
      
    <!-- Responsive menu - START -->
	<?= $this->render('menu'); ?> 
    <!-- Responsive menu - END -->
	
    <!-- Responsive slider - START -->
	<?= $this->render('slider'); ?> 
    <!-- Responsive slider - END -->
 
<!--	
		<div class="content">
			<h2><span>Nam libero tempore cum solutanobis est eligendi optio cumque</span></h2>
			<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis 
			praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
			excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui
			soluta nobis est eligendi optio cumque nihil impedit quo minus id </p>
		</div>-->
           
	<?php if(Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) == TRUE ): ?>
            <div class="feature">
                <div class="breadcrumbs">
                        <h4><?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]); ?></h4>
                </div>
            </div>  
        <?php endif; ?>
        <div class="breadcrumbs">
                    <h4>Recent Works</h4>
        </div>
            
            <?= $content; ?>	
		
	<!--start footer-->
	<?= $this->render('footer');?>
	<!--end footer-->
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<!--    	<script>
	wow = new WOW(
	 {
	
		}	) 
		.init();
	</script>-->
    <?php $this->endBody() ?>    
  </body>
</html>
<?php $this->endPage() ?>