<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Lignehf $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lignehfs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lignehf-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Mettre à jour', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Êtes-vous sûr de vouloir supprimer ses données ?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Terminer', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'idVisiteur',
            //'mois',
            'libelle',
            'date',
            'montant',
            'Justificatifs',
        ],
    ]) ?>

</div>
