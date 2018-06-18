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
}
?>
