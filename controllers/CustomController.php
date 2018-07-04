<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use yii\web\Controller;

/**
 * Description of CustomController
 *
 * @author SKYNET
 */
class CustomController extends Controller {
    //put your code here
    public static function printr($value) {
        if($value) {
            echo '<pre>';
             var_dump($value);
            echo '</pre>';
        } else {
            echo 'ERROR';
        }
    }
    
    protected  function setMeta ($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title; // Возвращаем title на страницу
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $keywords]); // Возвращаем keywords на страницу
        $this->view->registerMetaTag(['name' => 'description', 'content' => $description]); // Возвращаем description на страницу
    }
}


?>
