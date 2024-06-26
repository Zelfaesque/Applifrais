<?php

use app\models\Lignehf;
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

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'idVisiteur',
            //'mois',
            'libelle',
            'date',
            //'montant',
           
        ],
    ]); ?>


</div>
