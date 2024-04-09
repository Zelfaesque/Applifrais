<?php

namespace app\controllers;

use app\models\fichefrais;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FichefraisController implements the CRUD actions for fichefrais model.
 */
class FichefraisController extends Controller
{
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
     * Lists all fichefrais models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => fichefrais::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idVisiteur' => SORT_DESC,
                    'mois' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single fichefrais model.
     * @param string $idVisiteur Id Visiteur
     * @param string $mois Mois
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idVisiteur, $mois)
    {
        return $this->render('view', [
            'model' => $this->findModel($idVisiteur, $mois),
        ]);
    }

    /**
     * Creates a new fichefrais model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new fichefrais();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idVisiteur' => $model->idVisiteur, 'mois' => $model->mois]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing fichefrais model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idVisiteur Id Visiteur
     * @param string $mois Mois
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idVisiteur, $mois)
    {
        $model = $this->findModel($idVisiteur, $mois);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idVisiteur' => $model->idVisiteur, 'mois' => $model->mois]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing fichefrais model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idVisiteur Id Visiteur
     * @param string $mois Mois
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idVisiteur, $mois)
    {
        $this->findModel($idVisiteur, $mois)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the fichefrais model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idVisiteur Id Visiteur
     * @param string $mois Mois
     * @return fichefrais the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idVisiteur, $mois)
    {
        if (($model = fichefrais::findOne(['idVisiteur' => $idVisiteur, 'mois' => $mois])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
