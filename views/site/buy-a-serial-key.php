<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Buy A Serial Key';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content">
    
        <div class="row">
            <p>In case, for some reasons, you can not buy KSWEB with the help of built-in buying function of our app through Google Play we provide the opportunity to buy a serial key from our site.</p>

            <p>The registration with serial keys was included to our app begining from version 2.7 and higher. Both Standard and PRO version keys are usable for version 2.7 and higher.
            Only KSWEB 3.1 and higher is extendable to PRO version with PRO version key.</p>
            <p>Notice, that your serial key is bound to your Google account.</p>
            <p>In case of use KSWEB for business applications, one license is valid only on one device.
            For home use, your license is valid on all android devices with your Google account. </p>

            <p>More information about KSWEB licensing offers for business applications is available here:
            <?= Html::a('http://kslabs.ru/business-offers/.', Url::to(['kslabs.ru/business-offers/'], 'https'))?></p>

            <p>At the purchasing, please, do not forget to specify all needed data such as your Google account, your Standard serial key! If you don’t have Google account, then leave google account field blank. 
                In this case your serial key will be bind to unique device id of your device.We will send your serial key just after your payment is successfully processed.</p>

            <p>Purchasing options: </p>

            <p>Bellow, you can see purchase options. All payments will be processed by PayPal. </p>
        </div> 
</div>

