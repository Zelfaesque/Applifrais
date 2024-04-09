<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\fichefrais $model */

$this->title = $model->idVisiteur;
$this->params['breadcrumbs'][] = ['label' => 'Fichefrais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fichefrais-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'idVisiteur' => $model->idVisiteur, 'mois' => $model->mois], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Annuler', ['delete', 'idVisiteur' => $model->idVisiteur, 'mois' => $model->mois], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => "Êtes vous sûr d'annuler votre saisie ?",
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Terminer', ['site/test'], ['class' => 'btn btn-primary']) ?>
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
