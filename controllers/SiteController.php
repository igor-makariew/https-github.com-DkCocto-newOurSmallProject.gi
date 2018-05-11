<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use yii\widgets\ActiveForm;
use app\controllers\CustomController;



class SiteController extends Controller
{
    public $password;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    // init
    private $path;

    public function init()
    {
        $this->path = Yii::getAlias('@app/web/files/');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->view->title = 'Главная';
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    /**
     * Download action.
     *
     * @return Response
     */
    
    /**
     * Registratiom action.
     *
     * @return Response
     */
     
    public function actionFormRegistration()
    {
//        Yii::$app->controller->enableCsrfValidation = false; 
        $this->view->title = 'Registration';
        $this->layout = 'page';
        
        if(!Yii::$app->user->isGuest)
        {
            return $this->redirect('/');
        }
        $model = new User();
        
        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) ) {
//                foreach($model as $key => $models) {
//                    echo $models.'<br>';
//                };
//                die;
            if($model->validate()) {
//                foreach($model as $key => $models) {
//                    echo $models.'<br>';
//                };
//                die;
                $this->password = $model->password;
                if(!User::find()->where(['email' => $model->email])->limit(1)->all())
                {
//                    foreach($model as $key => $models) {
//                    echo $models.'<br>';
//                    };
//                     die;
                    $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
                    $model->code = Yii::$app->getSecurity()->generateRandomString(10);
                    $model->active = 0;
                    if($model->save())
                    {
                        foreach($model as $key => $models) {
                        echo $models.'<br>';
                        };
                         die;
                        Yii::$app->session->setFlash('success', 'Загрузка успешна.');
                        return $this->redirect('/');
                    }
                    else 
                    {
    //                    Yii::$app->response->format = Response::FORMAT_JSON;
                        Yii::$app->session->setFlash('error', 'Ошибка при загрузке.');
    //                    return ActiveForm::validate($model);                 
//                        return $this->redirect('/');
                    }
                }
                else {
                    return $this->redirect('/');
                } 
            }
        }
        return $this->render('form-registration', compact('model'));
    }
    
    public function actionRegistr()
    {
        if(!Yii::$app->user->isGuest)
        {
            return $this->redirect('/');
        }
        // Подключаемся к модели
        $model = new User();
        // Если чтото пришло
      
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            $this->password = $model->password;
            if(!User::find()->where(['email'=> $model->email])->limit(1)->all())
            {
                $model->password= Yii::$app->security->generatePasswordHash($model->password);
                $model->code = Yii::$app->getSecurity()->generateRandomString(10);
                $model->active = 0;
                if ($model->save())
                {
                    return $this->redirect('/');
                }
                else
                {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return ActiveForm::validate($model);
                }
            }
            else {
                return $this->redirect('/');
            }
        }
        return $this->renderAjax('_form_registr', compact('model'));
    }
    
    public function actionDownload($name = NULL)
    {
        $this->layout = 'page';
        $this->view->title = 'Download';
        if($name == NULL):
            return $this->render('download');
        elseif ($name):            
            $files = Yii::$app->response->sendFile($this->path . $name, null,  ['mimeType' => 'application/pdf']);
            return $this->render('download', compact('files'));
        endif;
    }
    
    /**
     * BusnessOffers action.
     *
     * @return Response
     */
    
    public function actionBusnessOffers()
    {
        $this->layout = 'page';
        $this->view->title = 'Busness Offers';
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('busness-offers', [
            'model' => $model,
        ]);
    }
    
    /**
     * BuyASerialKey action.
     *
     * @return Response
     */
    
    public function actionBuyASerialKey()
    {
        $this->layout = 'page';
        $this->view->title = 'Buy A Serial Key';
        
        return $this->render('buy-a-serial-key');
    }
    
    /**
     * BuyASerialKey action.
     *
     * @return Response
     */
    public function actionFeaturesInfo() 
    {
        $this->layout = 'page';
        $this->view->title = 'Features Info';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
//            return $this->render('login');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('features-info', [
            'model' => $model,
        ]);
        
    }
    
    /**
     * PhpModulesList action.
     *
     * @return Response
     */
    public function actionPhpModulesList() 
    {
        $this->layout = 'page';
        $this->view->title = 'Php Modules List';
        return $this->render('php-modules-list');
        
    }
    
    /**
     * PhpModulesList action.
     *
     * @return Response
     */
    public function actionServerModulesList() 
    {
        $this->layout = 'page';
        $this->view->title = 'Server Modules List';
        return $this->render('server-modules-list');
        
    }
    
    /**
     * Scheduler action.
     *
     * @return Response
     */
    public function actionScheduler() 
    {
        $this->layout = 'page';
        $this->view->title = 'Scheduler';
        return $this->render('scheduler');
        
    }
    
    /**
     * Scheduler action.
     *
     * @return Response
     */
    public function actionKswebControl() 
    {
        $this->layout = 'page';
        $this->view->title = 'Ksweb Control';
        return $this->render('ksweb-control');
        
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $this->layout = 'page';
        $this->view->title = 'Contact';
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $this->layout = 'page';
        return $this->render('about');
    }
}
