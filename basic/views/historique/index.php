<?php

use app\models\Lignehf;
use app\models\LigneFraisForfait;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Lignehf2Search $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Historique Hors Forfaits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lignehf-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel1]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'filterModel' => $searchModel2,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'idVisiteur',
           // 'mois',
            'libelle',
            'date',

            [ 
                'attribute' => 'montant',
                'contentOptions' => ['class' => 'texte-droite'],
                'value' => function ($model) {
                    return $model->montant.' €';
                },
            ],

            'Justificatifs',
           
        ],
    ]); ?>


</div>

<div class="lignefraisforfait-index">

    <h1><?= Html::encode('Historique de vos Frais Forfaits') ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel2]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel1,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idVisiteur',
            //'mois',
            'idFraisForfait',

            [ 
                'attribute' => 'quantite',
                'contentOptions' => ['class' => 'texte-droite'],
                'value' => function ($model) {
                    return $model->quantite;
                },
            ],
            
            'Date',
           
        ],
    ]); ?>


</div>

<style type="text/css">
    
    .texte-droite{
        text-align: right;
    }
</style>