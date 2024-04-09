<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Lignefraisforfait $model */

$this->title = 'Update Lignefraisforfait: ' . $model->idVisiteur;
$this->params['breadcrumbs'][] = ['label' => 'Lignefraisforfaits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idVisiteur, 'url' => ['view', 'idVisiteur' => $model->idVisiteur, 'mois' => $model->mois, 'idFraisForfait' => $model->idFraisForfait]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lignefraisforfait-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
