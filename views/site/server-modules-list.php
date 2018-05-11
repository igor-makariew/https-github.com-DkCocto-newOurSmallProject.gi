<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Server Modules List';
$this->params['breadcrumbs'][] = $this->title;
?>
    
        
        <div class="content">
            <h3>Server mudules list</h3>
            
                <p>KSWEB&#8217;s server (lighttpd) includes extensions:</p>
                <ul>
                    <li>mod_rewrite</li>
                    <li>mod_redirect</li>
                    <li>mod_alias</li>
                    <li>mod_extforward</li>
                    <li>mod_access</li>
                    <li>mod_auth</li>
                    <li>mod_setenv</li>
                    <li>mod_flv_streaming</li>
                    <li>mod_indexfile</li>
                    <li>mod_userdir</li>
                    <li>mod_dirlisting</li>
                    <li>mod_status</li>
                    <li>mod_simple_vhost</li>
                    <li>mod_evhost</li>
                    <li>mod_secdownload</li>
                    <li>mod_cgi</li>
                    <li>mod_fastcgi</li>
                    <li>mod_scgi</li>
                    <li>mod_ssi</li>
                    <li>mod_proxy</li>
                    <li>mod_staticfile</li>
                    <li>mod_webdav</li>
                    <li>mod_evasive</li>
                    <li>mod_compress</li>
                    <li>mod_usertrack</li>
                    <li>mod_expire</li>
                    <li>mod_accesslog</li>
                </ul>
        </div>
                  

        <div class="content">
            <p>On purchasing of licenses, please, contact us <?= Html::a('dkcocto@gmail.com.', Url::to(['dkcocto@gmail.com', 'subject' => 'KSWEB License'])) ?><p>
        </div>

        

        