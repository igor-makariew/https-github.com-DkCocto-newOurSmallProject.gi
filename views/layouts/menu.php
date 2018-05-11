<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<header>
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<div class="navbar-brand">
                                                            <h1><?= Html::a('KSWEB', Url::to(['site/index']))?><br /><br /></h1>
<!--                                                            <br>-->
                                                            <h3>A Developer`s Suite For Android Platform</h3>
                                                            <h4><?= Html::a('Регистрация', Url::to(['site/form-registration']))?> </h4>
							</div>
						</div>
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
                                                            <li role="presentation" class="active"><?= Html::a('Home', Url::to(['site/index']))?></li>
                                                                <li role="presentation" ><?= Html::a('Download', Url::to(['site/download']))?></li>
                                                                <li role="presentation"><?= Html::a('Busness Offers', Url::to(['site/busness-offers']))?></li>
                                                                <li role="presentation"><?= Html::a('Buy A Serial Key', Url::to(['site/buy-a-serial-key']))?></li>
                                                                <li role="presentation"><?= Html::a('Features Info', Url::to(['site/features-info']))?>
                                                                        <ul class="nav-tabs-li" role="tablist">
                                                                        <li role="presentation"><?= Html::a('PHP MODULES LIST', Url::to(['site/php-modules_list']))?></li>
                                                                        <li role="presentation"><?= Html::a('SERVER MODULES LIST', Url::to(['site/server-modules-list']))?></li>
                                                                        <li role="presentation"><?= Html::a('SCHEDULER', Url::to(['site/scheduler']))?></li>
                                                                        <li role="presentation"><?= Html::a('KSWEB CONTROL', Url::to(['site/ksweb-control']))?></li>
                                                                        </ul>
                                                                    </li>
                                                                <li role="presentation"><?= Html::a('Contact', Url::to(['site/contact']))?></li>						
							</ul>
						</div>
					</div>			
				</nav>
			</div>
		</div>
	</header>
	