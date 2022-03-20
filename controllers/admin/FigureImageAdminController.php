<?php

namespace app\controllers\admin;

use Yii;
use app\models\figures\FigureImage;
use app\models\figures\FigureImageSearch;
use app\controllers\AppController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FigureImageAdminController implements the CRUD actions for FigureImage model.
 */
class FigureImageAdminController extends AppController
{
    public $layout = 'admin';

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all FigureImage models.
     *
     * @return string
     */
    public function actionIndex($figure_id)
    {
        $searchModel = new FigureImageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'figure_id' => $figure_id,
        ]);
    }

    /**
     * Displays a single FigureImage model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionView($id)
    // {
    //     return $this->render('view', [
    //         'model' => $this->findModel($id),
    //     ]);
    // }

    /**
     * Creates a new FigureImage model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new FigureImage();
        if ($this->request->isGet) {
            $model->figure_id = Yii::$app->request->get('figure_id');
            return $this->render('create', ['model' => $model]);
        }
        if ($model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index', 'figure_id' => $model->figure_id]);
        }
    }

    /**
     * Updates an existing FigureImage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index', 'figure_id' => $model->figure_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FigureImage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $figure_id = $model->figure_id;
        unlink(Yii::$app->basePath . '/web/' . $model->url);
        $model->delete();
        Yii::$app->session->setFlash('success', 'Изображение успешно удалено');
        return $this->redirect(['index', 'figure_id' => $figure_id]);
    }

    /**
     * Finds the FigureImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return FigureImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FigureImage::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
