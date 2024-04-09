<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Lignehf $model */

$this->title = 'Saisissez vos hors forfaits';
$this->params['breadcrumbs'][] = ['label' => 'Lignehfs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lignehf-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
