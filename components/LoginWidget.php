<?php

namespace app\components;

use yii\base\Widget;
use app\models\Users;
use Yii;

/**
 * Description of LoginWidget
 *
 * @author SKYNET
 */
class LoginWidget extends Widget {
    //put your code here
    public $views; 
    public $model;
    
    /**
     * Определяем страницу
     */
    
    public function init() {
        parent::init();
        
        if($this->views === null) {
            $this->views = 'login';
        }
        $this->views .= '.php';
    }
    
    public function run() {
        parent::run();
        
        if(!Yii::$app->user->isGuest) {
            $model = Users::find()->where(['id' => Yii::$app->user->id])->one();
            return $this->toTemplateUser($model);
        } else {
            $model = new Users();
            return $this->toTemplate($model);
        }
    }
    
    // Передача в шаблон параметров пользователя
    
    protected function toTemplate($model) {
        ob_start();
        include __DIR__ . '/views/' . $this->views;
        return ob_get_clean();
    }
    
    // передача в шаблон модели пользователя
        protected function toTemplateUser($model)
    {
        ob_start();
        include __DIR__ . '/views/' . $this->views;
        return ob_get_clean();
    }
}
