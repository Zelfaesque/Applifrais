<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Fichefrais $model */

$this->title = $model->idVisiteur;
$this->params['breadcrumbs'][] = ['label' => 'Fichefrais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fichefrais-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idVisiteur' => $model->idVisiteur, 'mois' => $model->mois], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idVisiteur' => $model->idVisiteur, 'mois' => $model->mois], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idVisiteur',
            'mois',
            'nbJustificatifs',
            'montantValide',
            'dateModif',
            'idEtat',
        ],
    ]) ?>

</div>
