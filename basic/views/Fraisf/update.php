<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Fichefrais $model */

$this->title = 'Update Fichefrais: ' . $model->idVisiteur;
$this->params['breadcrumbs'][] = ['label' => 'Fichefrais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idVisiteur, 'url' => ['view', 'idVisiteur' => $model->idVisiteur, 'mois' => $model->mois]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fichefrais-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
