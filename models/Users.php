<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $autth_key
 * @property string $code
 * @property integer $active
 */


class Users extends ActiveRecord implements IdentityInterface
{
    const ACTIVE_USER = 1;
//    public $email;
//    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'username', 'password'], 'required', 'on' => 'form-registration'],
            [['active'], 'integer'],
            ['email', 'email'],
            [['email', 'username', 'password', 'autth_key', 'code'], 'string', 'max' => 255],
            [['auth_key', 'code', 'active', 'username', 'rememberMe'], 'safe', 'on' => 'login'],
            ['rememberMe', 'boolean', 'on' => 'login'],
            [['email', 'password'],'required', 'on' => 'login'],
            [['auth_key', 'code'], 'safe', 'on' => 'form-registration'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
           
            'email' => 'E-mail',
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня'
        ];
    }
    
    public function sendConfirmationLink() {
        $confirmationLinkUrl = Url::to(['ksweb.local/site/confirm-email', 'email' => $this->email, 'code' => $this->code, 'password' => $this->password]); // надо настроить ссылку или yii2
        $confirmationLink = Html::a('Подтвердить Email', $confirmationLinkUrl);
        
        $sendingResult = Yii::$app->mailer->compose()
        ->setFrom(Yii::$app->params['adminEmail'])
        ->setTo($this->email)
        ->setSubject('Пожалуйста, подтвердите свой Email') 
        ->setTextBody('Для прохождения регистрации Вам необходимо подтвердить свой Email, перейдя по ссылке: ' . $confirmationLinkUrl)
        ->setHtmlBody('<p>Для прохождения регистрации Вам необходимо подтвердить свой Email, перейдя по ссылке ниже:</p>' . $confirmationLink)
        ->send();   
        
        return $sendingResult;
    }
    
        // Ищим пользователя по id
    public static function findIdentity($id)
    {
        return static ::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        /* return static::findOne(['access_token' => $token]);*/
    }

    // Ищим пользователя по E-mail и проверяем потверждён ли аккаунт
    public static function findByUsername($email)
    {
        return static ::findOne(['email' =>$email, 'active' =>self::ACTIVE_USER]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->autth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->autth_key === $authKey;
    }

    // Проверяем пароль, каторый вёл пользователь
    public function validatePassword($password)
    {


        //  return $this->password === $password;
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    // Генерируем рандомную строку
    public function generateAuthKey()
    {
        $this->autth_key = Yii::$app->security->generateRandomString();
    }
    
    public function login()
    {
        $this->scenario = 'login';
        if($this->validate()) {
            if($this->rememberMe) {
                $cookie = $this->getUser();
                $cookie ->generateAuthKey();
                $cookie ->save();
            }
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }
    
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = $this->findByUsername($this->email);
        }

        return $this->_user;
    }
}
