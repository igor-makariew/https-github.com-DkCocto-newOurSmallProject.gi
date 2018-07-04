<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
	'css/responsive-slider.css',
	'css/animate.css',
//        'css/animate.min.css',
	'css/font-awesome.min.css',
	'css/style.css',	
    ];
    public $js = [
//        'js/site.js',
//        'js/jquery-2.1.1.min.js',
//        'js/bootstrap.min.js',
        'js/fliplightbox.min.js',
	'js/responsive-slider.js',
//        'js/responsive-slider.min.js',
        'js/main.js',
//	'js/wow.min.js',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];

    public $cssOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset', // добавляет bootstrap.min.css, jquery-2.1.1.min.js, bootstrap.min.js
    ];
}
