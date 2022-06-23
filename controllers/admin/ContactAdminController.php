<?php

namespace app\controllers\admin;

use Yii;
use app\models\contacts\ContactSearch;
use app\models\contacts\Contact;

class ContactAdminController extends \yii\web\Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        $searchModel = new ContactSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Contact();
        $model->date = strval(time());
        if ($model->load($this->request->post(), 'ContactForm') && $model->save()) {
            Yii::$app->session->setFlash('success', 'Contact successfully completed ');
        }
        else Yii::$app->session->setFlash('error', 'An error occurred while contact ');
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->state == Contact::STATE_HANDLED) $model->state = Contact::STATE_NOT_HANDLED;
        else $model->state = Contact::STATE_HANDLED;

        if ($model->save(false)) Yii::$app->session->setFlash('success', 'Состояние успешно изменено');
        else Yii::$app->session->setFlash('error', 'Ошибка при изменении состояния');
        
        return $this->redirect(Yii::$app->request->referrer);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Contact::findOne(['id' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
