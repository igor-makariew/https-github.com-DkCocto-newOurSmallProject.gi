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

/**
 * Description of CategoryController
 *
 * @author SKYNET
 */
class CategoryController extends CustomController {
    //put your code here
    public function actionPhpModulesList () {
        
        $categoryId = (int)Yii::$app->request->get('id');
        $category = Category::findOne($categoryId);
//      
        $query = Lesson::find();
        $query->where(['idCategory' => $categoryId]);
        $query->orderBy('id ASC');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        
        return $this->render('view', compact('dataProvider'));
    }
    
}
