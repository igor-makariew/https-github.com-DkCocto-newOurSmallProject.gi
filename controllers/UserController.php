<?php
namespace app\controllers;

use app\controllers\CustomController;
use app\models\Users;
use app\models\Lesson;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use rico\yii2images\models\Image;

/**
 * Description of UserController
 *
 * @author SKYNET
 */
class UserController extends CustomController{
    //put your code here
    
    public $Password; // Сдесь храним пустой пароль
    
    // Просмотр страницы пользователя
    public function actionView() {
        if(!Yii::$app->user->isGuest) {
            $model = Users::findOne(Yii::$app->user->id);
//            CustomController::printr($model);
//            exit();
            $this->setMeta('Личный кабинет');
            return $this->render('view', compact('model'));
        } else {
            throw new NotFoundHttpException('Вы не зарегестрированный пользователь.');
        }
        
    }
    
    public function actionUpdate() {
        if(!Yii::$app->user->isGuest) {
            $model = Users::findOne(Yii::$app->user->id);
            $this->setMeta('Редактирование профиля');
            if($model->load(Yii::$app->request->post()) && $model->save()) {
                $model->image = UploadedFile::getInstance($model, 'image');
                if($model->image) {
                    $model->upload();
                }
                Yii::$app->session->setFlash('success', 'Ваши данные изменены');
                return $this->redirect('view');
            }
        return $this->render('update', compact('model'));
        } else {
            throw new NotFoundHttpException('Вы не зарегестрированный пользователь.');
        }
    }
    
    public function actionDelImg($id, $img = NULL) {
        $model = Users::findOne(Yii::$app->user->id);
        // $model = Users::findOne((int)$id);
        if($img !== NULL && ($image = Image::findOne($img))) {
            $model->removeImage($image);
        }
        return 'ok';
    }
    
    public function actionReplacement() {
        if(!Yii::$app->user->isGuest) {
            $model = Users::findOne(Yii::$app->user->id);
            $this->setMeta('Изменение пароля');
            $model->scenario = 'replacement';
//           
            $model->password = $this->Password; // грузим пустой пароль
//           
            if($model->load(Yii::$app->request->post())) {
                CustomController::printr($model);
                exit();
                $this->Password = $model->password;
                $model->password = Yii::$app->security->generatePasswordHash($this->Password);
                if($model->save()){
                    Yii::$app->session->setFlash('success', 'Пароль успешно изменен');
                    return $this->redirect('view');
                } else {
                    $model->password = $this->Password;
                    return $this->render('replacement', compact($model));
                }
            } else {
                return $this->render('replacement', compact($model));
            }
        } else {
            throw new NotFoundHttpException('Вы не зарегестрированный пользователь.');
        }
    }

}
