<?php

namespace app\controllers;

use app\models\Lignehf;
use app\models\LignehfSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii;

/**
 * LignehfController implements the CRUD actions for Lignehf model.
 */
class LignehfController extends Controller
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
     * Lists all Lignehf models.
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

        $searchModel = new LignehfSearch();
        $searchModel->idVisiteur = $userid;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['idVisiteur' => $userid]);
        $totalAmount = $dataProvider->query->sum('montant');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'totalAmount' => $totalAmount,
        ]);
    }

    /**
     * Displays a single Lignehf model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
   public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Lignehf model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */


public function actionCreate()
    {
        $model = new Lignehf();


        if ($model->load(Yii::$app->request->post())) {
            $fichier = UploadedFile::getInstance($model, 'Justificatifs');

            if ($fichier !== null) {
                $destinationPath = Yii::getAlias('@webroot') . '/uploads/';
                $fileName = $fichier->baseName . '.' . $fichier->extension;
                $filePath = $destinationPath . $fileName;

                if ($fichier->saveAs($filePath)) {
                    $model->Justificatifs = $fileName;
                } else {
                    // Gérer l'erreur lors du déplacement du fichier
                }
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }



    /**
     * Updates an existing Lignehf model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Lignehf model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Lignehf model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Lignehf the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lignehf::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
