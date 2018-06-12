<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property int $idCategory
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property int $lesson
 * @property string $text
 * @property string $video
 * @property int $views
 */
class Lesson extends \yii\db\ActiveRecord
{
    public $image;
    
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
    public static function tableName()
    {
        return 'lesson';
    }
    
    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'idCategory']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCategory', 'title', 'keywords', 'description', 'lesson', 'text', 'video'], 'required'],
            [['idCategory', 'lesson', 'views'], 'integer'],
            [['text', 'video'], 'string'],
            [['title', 'keywords', 'description'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCategory' => 'Категория',
            'title' => 'Название урока',
            'keywords' => 'Ключевики',
            'description' => 'Описание',
            'lesson' => '№ Урока',
            'text' => 'Описание урока',
            'video' => 'Видео',
            'views' => 'Количество просмотров',
            'image' => 'Слайд',
        ];
    }
    
    public function upload() {
        if($this->validate()) {
            $path = 'img/store/'.$this->image->baseName.'.'.$this->image->extension;
            $this->image->saveAs($path);
//            $this->image->attachImage($path, true); // не могу найти описание метода
//            @unlink($path);
            return true;
        }
        else {
            return false;
        }
    }
}
