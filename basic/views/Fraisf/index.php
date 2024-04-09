<?php

use app\models\Fichefrais;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\FichefraisSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fichefrais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fichefrais-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fichefrais', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idVisiteur',
            'mois',
            'nbJustificatifs',
            'montantValide',
            'dateModif',
            //'idEtat',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Fichefrais $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idVisiteur' => $model->idVisiteur, 'mois' => $model->mois]);
                 }
            ],
        ],
    ]); ?>


</div>
