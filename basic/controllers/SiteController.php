<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Fichefrais;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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

    public function actionCreate()
    {
    Yii::$app->request->enableCsrfValidation = false;
 
}

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
            // Vérifier si l'utilisateur est connecté
    if (Yii::$app->user->isGuest) {
        // Rediriger vers la page de connexion ou afficher un message d'erreur
        return $this->redirect(['site/login']);
    }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
    if (!Yii::$app->user->isGuest) {
        return $this->render('login');
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {

        $ficheFrais = new Fichefrais();
        if ($ficheFrais->createFicheFrais()) {
            Yii::$app->session->setFlash('success', 'La fiche de frais a été créée avec succès.');
        } else {
            Yii::$app->session->setFlash('error', 'Une erreur est survenue lors de la création de la fiche de frais.');
        }

        return $this->redirect(['test']);
    }

    $model->MotDePasse = '';
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
        return $this->render('about');
    }
    public function actionEntry()
    {
        $model = new EntreForm;

        if ($model->Load(Yii::$app->request->post()) && $model->validate()) {
            // données valides reçues dans $model
            return $this->render('entrey-confirm', ['model' => $model]);
        } else {
            return $this->render('entry', ['model' => $model]);
        }
    }

    public function actionTest()
    {
        return $this->render('test');
    }

}

