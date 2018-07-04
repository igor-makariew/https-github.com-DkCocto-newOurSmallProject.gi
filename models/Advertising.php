<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advertising".
 *
 * @property int $id
 * @property int $userId
 * @property int $status
 * @property string $text
 * @property string $link
 * @property int $month
 * @property string $createDate
 * @property string $endDate
 */
class Advertising extends \yii\db\ActiveRecord
{
    public $image; // переменая для картинки
    public $verifyCode;


    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    /**
     * {@inheritdoc}
     */
//    public static function tableName()
//    {
//        return 'advertising';
//    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
             [['status', 'text', 'link', 'month'], 'required'],
            [['userId', 'status', 'month'], 'integer'],
            [['text'], 'string'],
            [['createDate', 'endDate'], 'safe'],
            [['link'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg, png'],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
//             'id' => 'ID',
//             'userId' => 'User ID',
            'status' => 'Статус заявки',
            'text' => 'Текст рекламы',
            'link' => 'Ссылка',
            'month' => 'кол-во месяцев',
            'createDate' => 'Дата создания рекламы',
            'endDate' => 'Дата окончания рекламы',
            'image' => 'Баннер',
        ];
    }
    
    public function upload()
    {
        if ($this->validate())
        {
            $path = 'img/store' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }
        else
        {
            return false;
        }
    }
    
    /**
     *
     * Отправка писма "Заявка на рекламу"
     *
     * @return mixed
     */
    public function sendAdvertising()
    {

        $sendingResult = Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo(Yii::$app->params['adminEmail'])
            ->setSubject('Заявка на рекламу')
            ->setHtmlBody('<p>Новая заявка на рекламу</p>')
            ->send();

        return $sendingResult;
    }
}
