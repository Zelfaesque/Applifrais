<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Lignefraisforfait $model */

$this->title = $model->idVisiteur;
$this->params['breadcrumbs'][] = ['label' => 'Lignefraisforfaits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lignefraisforfait-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Mettre à jour', ['update', 'idVisiteur' => $model->idVisiteur, 'mois' => $model->mois, 'idFraisForfait' => $model->idFraisForfait], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'idVisiteur' => $model->idVisiteur, 'mois' => $model->mois, 'idFraisForfait' => $model->idFraisForfait], [
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
            // 'idVisiteur',
            //'mois',
            'idFraisForfait',
            'quantite',
            'Date',
        ],
    ]) ?>

</div>
