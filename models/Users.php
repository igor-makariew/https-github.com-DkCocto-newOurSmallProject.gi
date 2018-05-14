<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\helpers\Url;
use yii\helpers\Html;

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


class Users extends ActiveRecord
{
    const ACTIVE_USER = 1;


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
            [['email', 'username', 'password'], 'required'],
            [['active'], 'integer'],
            ['email', 'email'],
            [['email', 'username', 'password', 'autth_key', 'code'], 'string', 'max' => 255],
            [['autth_key', 'code'], 'safe']
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
        ];
    }
    
    public function sendConfirmationLink() {
        $confirmationLinkUrl = Url::to(['ksweb.local/site/confirm-email', 'email' => $this->email, 'code' => $this->code]);
        $confirmationLink = Html::a('Подтвердить Email', $confirmationLinkUrl);
        
        $sendingResult = Yii::$app->mailer->compose()
        ->setFrom(Yii::$app->params['adminEmail'])
        ->setTo($this->email)
        ->setSubject('Пожалуйста, подтвердите свой Email') 
        ->setTextBody('Для прохождения регистрации Вам необходимо подтвердить свой Email, перейдя по ссылке: ' . $confirmationLinkUrl)
        ->setHtmlBody('<p>Для прохождения регистрации Вам необходимо подтвердить свой Email, перейдя по ссылке ниже:</p>' . $confirmationLink)
        -> send();   
        
        return $sendingResult;
    }
}
