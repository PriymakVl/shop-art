<?php

namespace app\controllers\admin;

use app\models\Author;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthorAdminController implements the CRUD actions for Author model.
 */
class AuthorAdminController extends Controller
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
     * Displays a single Author model.
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        $model = Author::findOne(['id' => 1]);
        $model = $model ?? $this->addAuthor();
        // debug($model);
        return $this->render('view', [ 'model' => $model]);
    }

    /**
     * Updates an existing Author model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = Author::findOne(['id' => 1]);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    private function addAuthor()
    {
        $author = new Author();
        $author->first_name = 'Не указано';
        $author->last_name = 'Не указано';
        $author->description = 'Не указано';
        $author->save(false);
        return $author;
    }

}
