<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Lignehf;
use app\models\Lignehf2Search;

use app\models\Lignefraisforfait;
use app\models\Lignefraisforfait2Search;

class HistoriqueController extends Controller{

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
     * Lists all Lignefraisforfait models.
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

       // Obtenir l'ID de l'utilisateur connecté
        $userid = Yii::$app->user->id;

        $searchModelhf = new Lignefraisforfait2Search();
        $searchModelhf->idVisiteur = $userid;
        $dataProviderhf = $searchModelhf->search(Yii::$app->request->queryParams);

        $searchModelff = new Lignehf2Search();
        $searchModelff->idVisiteur = $userid;
        $dataProviderff = $searchModelff->search(Yii::$app->request->queryParams); 

        return $this->render('index', [
            'searchModel1' => $searchModelhf,
            'dataProvider1' => $dataProviderhf,
			'searchModel2' => $searchModelff,
            'dataProvider2' => $dataProviderff,
        ]);
    }

    /**
     * Displays a single Lignefraisforfait model.
     * @param string $idVisiteur Id Visiteur
     * @param string $mois Mois
     * @param string $idFraisForfait Id Frais Forfait
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idVisiteur, $mois, $idFraisForfait)
    {
        return $this->render('view', [
            'model' => $this->findModel($idVisiteur, $mois, $idFraisForfait),
        ]);
    }

    /**
     * Creates a new Lignefraisforfait model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Lignefraisforfait();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idVisiteur' => $model->idVisiteur, 'mois' => $model->mois, 'idFraisForfait' => $model->idFraisForfait]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Lignefraisforfait model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idVisiteur Id Visiteur
     * @param string $mois Mois
     * @param string $idFraisForfait Id Frais Forfait
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    /* public function actionUpdate($idVisiteur, $mois, $idFraisForfait)
    {
        $model = $this->findModel($idVisiteur, $mois, $idFraisForfait);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idVisiteur' => $model->idVisiteur, 'mois' => $model->mois, 'idFraisForfait' => $model->idFraisForfait]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    } */

    /**
     * Deletes an existing Lignefraisforfait model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idVisiteur Id Visiteur
     * @param string $mois Mois
     * @param string $idFraisForfait Id Frais Forfait
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
   /*  public function actionDelete($idVisiteur, $mois, $idFraisForfait)
    {
        $this->findModel($idVisiteur, $mois, $idFraisForfait)->delete();

        return $this->redirect(['index']);
    } */

    /**
     * Finds the Lignefraisforfait model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idVisiteur Id Visiteur
     * @param string $mois Mois
     * @param string $idFraisForfait Id Frais Forfait
     * @return Lignefraisforfait the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idVisiteur, $mois, $idFraisForfait)
    {
        if (($model = Lignefraisforfait::findOne(['idVisiteur' => $idVisiteur, 'mois' => $mois, 'idFraisForfait' => $idFraisForfait])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}