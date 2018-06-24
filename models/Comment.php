<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $parent_id
 * @property int $id_lesson
 * @property string $username
 * @property string $text
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'id_lesson', 'username', 'text'], 'required'],
            [['parent_id', 'id_lesson'], 'integer'],
            [['text'], 'string'],
            [['username'], 'string', 'max' => 255],
            [['parent_id', 'id_lesson', 'username', 'text'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
//            'id' => 'ID',
//            'parent_id' => 'Parent ID',
//            'id_lesson' => 'Id Lesson',
//            'username' => 'Username',
            'text' => 'Комментарий',
        ];
    }
}
