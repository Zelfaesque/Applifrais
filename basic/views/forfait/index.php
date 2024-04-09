<?php

use app\models\Lignefraisforfait;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\LignefraisforfaitSearch $searchModel */
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

$this->title = 'Frais Forfaits du mois de ' .MtoFr(date('m'));
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lignefraisforfait-index">

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

           // 'idVisiteur',
            // 'mois',
            'idFraisForfait',

            [
                'attribute' => 'quantite',
                'contentOptions' => ['class' => 'texte-droite'],
            ],

            'Date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Lignefraisforfait $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idVisiteur' => $model->idVisiteur, 'mois' => $model->mois, 'idFraisForfait' => $model->idFraisForfait]);
                 }
            ],
        ],
    ]); ?>

</div>

<div class="total-amount">
    <strong>Quantité total : <?= $totalAmount ?></strong>
</div>

<style type="text/css">
    
    .texte-droite{
        text-align: right;
    }

</style>