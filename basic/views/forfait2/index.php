<?php

use app\models\Lignefraisforfait;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Lignefraisforfait2Search $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Historique de vos Frais Forfaits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lignefraisforfait-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idVisiteur',
            'mois',
            'idFraisForfait',
            'quantite',
            'Date',
        ],
    ]); ?>


</div>
