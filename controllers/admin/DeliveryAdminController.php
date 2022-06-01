<?php

namespace app\controllers\admin;

use app\models\Delivery;
use yii\data\ActiveDataProvider;
use app\controllers\AppController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DeliveryAdminController implements the CRUD actions for Delivery model.
 */
class DeliveryAdminController extends AppController
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
     * Displays a single Delivery model.
     * @return string
     * 
     */
    public function actionView()
    {
        $model = Delivery::findOne(['id' => 1]);
        $model = $model ?? $this->addDelivery();
        return $this->render('view', ['model' => $model]);
    }

    /**
     * Updates an existing Delivery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * 
     */
    public function actionUpdate($id)
    {
        $model = Delivery::findOne(['id' => 1]);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    // if page not 
    private function addDelivery()
    {
        $delivery = new Delivery();
        $delivery->text = 'Не указана';
        $delivery->save(false);
        return $delivery;
    }
}
