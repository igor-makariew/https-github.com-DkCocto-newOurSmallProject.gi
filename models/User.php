<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;

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


class User extends ActiveRecord
{
    public $email;
    public $username;
    public $password;
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
}
