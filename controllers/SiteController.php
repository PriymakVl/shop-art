<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\controllers\AppController;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\LoginForm;
use app\models\contacts\ContactForm;
use app\models\categories\Category;
use app\models\figures\Figure;
use app\models\Cart;
use app\models\Author;
use app\models\Delivery;

class SiteController extends AppController
{
    const PAGE_SIZE = 2;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $categories = Category::findAll(['status' => Category::STATUS_ACTIVE]);
        $query = Figure::find()->where(['status' => Figure::STATUS_ACTIVE]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => self::PAGE_SIZE]);
        $figures = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', compact('categories', 'figures', 'pages'));
    }

    public function actionShop($cat_id = false) 
    {
        $categories = Category::findAll(['status' => Category::STATUS_ACTIVE]);

        if ($cat_id) $figures = $this->getFiguresForPagination($cat_id);
        else $figures = Figure::findAll(['status' => Figure::STATUS_ACTIVE]);
        
        $pages = new Pagination(['totalCount' => count($figures), 'pageSize' => self::PAGE_SIZE]);
        return $this->render('shop', compact('categories', 'figures', 'pages'));
    }

    public function actionFigure($id)
    {
        $figure = Figure::findOne(['id' => $id, 'status' => Figure::STATUS_ACTIVE]);
        $cart = new Cart();
        $cart->figureId = $id;
        // debug($_SESSION);
        return $this->render('figure', compact('figure', 'cart'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $author = Author::findOne(1);
        return $this->render('about', ['author' => $author]);
    }

    /**
     * Displays shipping page.
     *
     * @return string
     */
    public function actionShipping()
    {
        $model = Delivery::findOne(1);
        return $this->render('shipping', ['model' => $model]);
    }

    private function getFiguresForPagination($cat_id)
    {
        $figures = Figure::getForCategory($cat_id);
        if (!$figures) return;
        $page = Yii::$app->request->get('page', 1);
        $offset = ($page - 1) * self::PAGE_SIZE;
        return array_slice($figures, $offset, self::PAGE_SIZE);
    }
}
