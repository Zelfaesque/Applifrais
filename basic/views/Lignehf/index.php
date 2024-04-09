<?php

use app\models\Lignehf;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var app\models\LignehfSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

function MtoFr($month){
    switch ($month) {
        case '01':
            return 'Janvier';
            break;
        case '02':
            return 'Février';
            break;
        case '03':
            return 'Mars';
            break;
        case '04':
            return 'Avril';
            break;
        case '05':
            return 'Mai';
            break;
        case '06':
            return 'Juin';
            break;
        case '07':
            return 'Juillet';
            break;
        case '08':
            return 'Août';
            break;
        case '09':
            return 'Septembre';
            break;
        case '10':
            return 'Octobre';
            break;
        case '11':
            return 'Novembre';
            break;
        case '12':
            return 'Décembre';
            break;
    }
}

$this->title = 'Hors Forfaits du mois de ' .MtoFr(date('m'));
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lignehf-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Saisir vos frais', ['create'], ['class' => 'btn btn-success']) ?>
            
        </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'idVisiteur',
            //'mois',
            'libelle',
            [ 
                'attribute' => 'montant',
                'contentOptions' => ['class' => 'texte-droite'],
                'value' => function ($model) {
                    return $model->montant.' €';
                },
            ],
            'date',
            'Justificatifs',


             [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Lignehf $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

</div>

<div class="total-amount">
    <strong>Montant Total : <?= $totalAmount ?> €</strong>
</div>

<style type="text/css">
    
    .texte-droite{
        text-align: right;
    }
</style>