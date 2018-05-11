<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Download';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="feature">
				
		<div class="container">
			<div class="row">
                            <p>Minimal requirements: Android device with OS version 2.3.3 or higher, ARM-based or Intel x86 processor.</p>
                            <p>You can install KSWEB from Google Play:</p>
                            <?= Html::a('https://play.google.com/store/apps/details?id=ru.kslabs.ksweb', Url::to(['play.google.com/store/apps/details', 'id' => 'ru.kslabs.ksweb'], 'https'))?>
                            <p>Or you can download installation package directly from our site:</p>
                            <?= Html::a('KSWEB v3.74', Url::to(['site/download', 'name'=>'8.pdf']))?>
                            <br />
                            <?= Html::a('KSWEB v3.73', Url::to(['site/download', 'name'=>'9.pdf']))?>
                            <br />
                            <?= Html::a('KSWEB v3.72', Url::to(['site/download', 'name'=>'10.pdf']))?>
                            
                            <h4><strong>Schedule!</strong></h4>

                            <p>Google Play:</p>
                            <?= Html::a('https://play.google.com/store/apps/details?id=ru.kslabs.scheduler', Url::to(['play.google.com/store/apps/details', 'id' => 'ru.kslabs.scheduler'], 'https'))?>
                            <p>From our site:</p>
                            <?= Html::a('Schedule! v1.01', Url::to(['site/download', 'name'=>'9.docx']))?>
                            <br />
                            
				<div class="col-md-6">
                                        <?= Html::img('/web/img/4.jpg', ['class' => 'img-responsive'])?>
					<!-- <img src="img/4.jpg" class="img-responsive"alt="" /> -->
					<p>Minimal requirements: Android device with OS version 2.3.3 or higher, ARM-based or Intel x86 processor.
					</p>
				</div>
				<div class="col-md-6">
                                        <?= Html::img('/web/img/4.jpg', ['class' => 'img-responsive'])?>
					<!-- <img src="img/4.jpg" class="img-responsive"alt="" /> --> 
					<p>Duis autem vel eum iriure dolor in hendrerit
					in vulputate velit esse molestie consequat,
					vel illum dolore eu feugiat nulla facilisis at
					vero eros et accumsan et iusto odio dignissim qui
					blandit praesent luptatum zzril delenit augue duis
					</p>
					
				</div>
			</div>
			
		</div>
		
		<div class="breadcrumbs">
			<h4>Example on 4 Columns ( use col-md-3)</h4>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-md-3">
                                        <?= Html::img('/web/img/4.jpg', ['class' => 'img-responsive'])?>
					<!-- <img src="img/4.jpg" class="img-responsive"alt="" /> --> 
					<p>Duis autem vel eum iriure dolor in hendrerit
					in vulputate velit esse molestie consequat,
					vel illum dolore eu feugiat nulla facilisis at
					</p>
				</div>
				<div class="col-md-3">
                                        <?= Html::img('/web/img/4.jpg', ['class' => 'img-responsive'])?>
					<!-- <img src="img/4.jpg" class="img-responsive"alt="" /> -->
					<p>Duis autem vel eum iriure dolor in hendrerit
					in vulputate velit esse molestie consequat,
					vel illum dolore eu feugiat nulla facilisis at
					</p>
				</div>
				<div class="col-md-3">
                                        <?= Html::img('/web/img/4.jpg', ['class' => 'img-responsive'])?>
					<!-- <img src="img/4.jpg" class="img-responsive"alt="" /> -->
					<p>Duis autem vel eum iriure dolor in hendrerit
					in vulputate velit esse molestie consequat,
					vel illum dolore eu feugiat nulla facilisis at
					</p>
				</div>
				<div class="col-md-3">
                                        <?= Html::img('/web/img/4.jpg', ['class' => 'img-responsive'])?>
					<!-- <img src="img/4.jpg" class="img-responsive"alt="" /> -->
					<p>Duis autem vel eum iriure dolor in hendrerit
					in vulputate velit esse molestie consequat,
					vel illum dolore eu feugiat nulla facilisis at				
					</p>
				</div>
			</div>		
		</div>
		
		<div class="breadcrumbs">
			<h4>Example on 3 Columns ( use col-md-4)</h4>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-md-4">
                                        <?= Html::img('/web/img/2.png', ['class' => 'img-responsive'])?>
					<!-- <img src="img/2.png" class="img-responsive"alt="" /> -->
					<p>Duis autem vel eum iriure dolor in hendrerit
					in vulputate velit esse molestie consequat,
					vel illum dolore eu feugiat nulla facilisis at
					vero eros et accumsan et iusto odio dignissim qui
					blandit praesent luptatum zzril delenit augue duis
					</p>
				</div>
				<div class="col-md-4">
                                        <?= Html::img('/web/img/2.png', ['class' => 'img-responsive'])?>
					<!-- <img src="img/2.png" class="img-responsive"alt="" /> -->
					<p>Duis autem vel eum iriure dolor in hendrerit
					in vulputate velit esse molestie consequat,
					vel illum dolore eu feugiat nulla facilisis at
					vero eros et accumsan et iusto odio dignissim qui
					blandit praesent luptatum zzril delenit augue duis
					</p>
				</div>
				<div class="col-md-4">
                                        <?= Html::img('/web/img/2.png', ['class' => 'img-responsive'])?>
					<!-- <img src="img/2.png" class="img-responsive"alt="" /> -->
					<p>Duis autem vel eum iriure dolor in hendrerit
					in vulputate velit esse molestie consequat,
					vel illum dolore eu feugiat nulla facilisis at
					vero eros et accumsan et iusto odio dignissim qui
					blandit praesent luptatum zzril delenit augue duis
					</p>
				</div>
			</div>		
		</div>
	</div>