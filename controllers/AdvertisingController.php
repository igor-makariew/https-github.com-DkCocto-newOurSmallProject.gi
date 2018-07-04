<?php

namespace app\controllers;

use app\controllers\CustomController;
use Yii;
use app\models\Advertising;
use yii\web\UploadedFile;
/**
 * Description of AdvertisingController
 *
 * @author SKYNET
 */
class AdvertisingController extends CustomController{
    //put your code here
    
    public function actions()
    {
        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    public function actionApplication() {
//        if(Yii::$app->user->isGuest) {
//            Yii::$app->session->setFlash('info', "Вы должны быть зарегестрированны.");
//            return redirect('site/login');
//        }
        
        $model = new Advertising(); 
//        CustomController::printr($model);
//        exit();
        if($model->load(Yii::$app->request->post())) {
            $model->advert = 0;
            $model->userId = Yii::$app->user->id;
            if($model->save()) {
                $model->image = UploadedFile::getInstance($model, 'image');
                if($model->image) {
                    $model->upload();
                }
                $model->sendAdvertising();
                Yii::$app->session->setFlash('success', " Заявка успешно отправлена.");
                return $this->goHome();
            }
        }
        return $this->render('application');
    }
}