<?php

use app\models\fichefrais;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fichefrais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fichefrais-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fichefrais', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
                'urlCreator' => function ($action, fichefrais $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idVisiteur' => $model->idVisiteur, 'mois' => $model->mois]);
                 }
            ],
        ],
    ]); ?>


</div>
