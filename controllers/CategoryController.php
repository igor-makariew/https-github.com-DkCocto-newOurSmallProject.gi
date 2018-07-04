<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use app\controllers\CustomController;
use app\models\Lesson;
use yii\data\ActiveDataProvider;
use app\models\Category;
use Yii;
use yii\web\NotFoundHttpException;
use app\models\Comment;
use app\models\Users;



/**
 * Description of CategoryController
 *
 * @author SKYNET
 */
class CategoryController extends CustomController {
    //put your code here
    public function actionView () {
        
        $lesson = (int)Yii::$app->request->get('lesson');
        
        $model = Lesson::findOne($lesson);
       
        if(!$model) {
            throw new NotFoundHttpException('Запрошенный урок не создан.');
        }
        $model->views += 1;
        $model->save();
        
        $comments = Comment::find()->where(['id_lesson' => $lesson])->indexBy('id')->asArray()->all();
        
        $tree = [];
        
        foreach($comments as $id=>&$node) {
            if(!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $comments[$node['parent_id']]['childs'][$node['id']] =  &$node;
            }
        }
        
        $comment = new Comment();

        if ($comment->load(Yii::$app->request->post()))
        {
            $user = Users::findOne(Yii::$app->user->id);

            $comment->id_lesson = $lesson;
            $comment->username = $user->username;
            $comment->parent_id = (int)$comment->parent_id;
            $comment->save();
        
            /**
             * Проверка на взлом БД
             */

            $les = Comment::find()->where(['parent_id' => $comment->parent_id])->all();
//             var_dump($les);
//        exit();
            if (!$les)
            {
                throw new NotFoundHttpException('Такого комментария нет.');
            }
            else
            {
                $comment->save();
            }

            return $this->redirect(['view', 'lesson' => $lesson]);
        }
        else
        {
            return $this->render('view', compact('model', 'category', 'tree', 'comment'));
        }
        
//        пагинация и сортировка
//        
//        $category = Category::findOne($categoryId);
////      
//        $query = Lesson::find();
//        $query->where(['idCategory' => $categoryId]);
//        $query->orderBy('id ASC');
//        
//        $dataProvider = new ActiveDataProvider([
//            'query' => $query,
//            'pagination' => [
//                'pageSize' => 10,
//            ],
//        ]);
//        
//        return $this->render('view', compact('dataProvider'));
    }
}
