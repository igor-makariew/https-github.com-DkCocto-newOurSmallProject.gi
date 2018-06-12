<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Lesson;
use app\modules\admin\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use app\controllers\CustomController;


/**
 * LessonController implements the CRUD actions for Lesson model.
 */
class LessonController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Lesson models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Lesson::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lesson model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Lesson model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Lesson();

        $cat = Category::find()->all();
        $category = ArrayHelper::map($cat, 'id', 'title');
        if ($model->load(Yii::$app->request->post(), $model['lesson']) && $model->save()) {
            return 'ошибка 2';
            //$model->image = UploadedFile::getInstance($model, 'image');
            if($model->image) {
                $model->upload();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            return 'ошибка 1';
//        return $this->render('create', [
//            'model' => $model,
//            'category' => $category,
//            ]);
        }
    }    
    
    /**
     * Updates an existing Lesson model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $cat = Category::find()->all();
        $category = ArrayHelper::map($cat, 'id', 'title');
        if ($model->load(Yii::$app->request->post(), $model['lesson']) && $model->save()) {
            return 'ошибка 2';
//            $model->image = UploadedFile::getInstance($model, 'image');
            if($model->image) {
                $model->upload();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
//        return $this->render('update', [
//            'model' => $model,
//            'category' => $category,
//        ]);
        return print_r(Yii::$app->request->post());
        }
    }
        
    /**
     * Deletes an existing Lesson model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Lesson model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lesson the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lesson::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрошенная страница не существует.');
    }
}
