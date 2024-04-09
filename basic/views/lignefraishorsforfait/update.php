<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Lignefraishorsforfait $model */

$this->title = 'Update Lignefraishorsforfait: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lignefraishorsforfaits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lignefraishorsforfait-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
