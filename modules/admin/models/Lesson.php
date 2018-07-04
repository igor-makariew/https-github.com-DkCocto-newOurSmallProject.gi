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
    public $gallery;
    
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
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
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
            'gallery' => 'Галерея',
        ];
    }
    
    // Две вспомогательные функции для сохранения всего и сразу. Смотри контроллер Create - используются там.
 public function upload(){
        if($this->validate()){
            $path = 'img/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }
 
    public function uploadGallery(){ // сохраняет целиком галерею
        if($this->validate()){
            foreach($this->gallery as $file){
                $path = 'img/store/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;
        }else{
            return false;
        }
    }
}
