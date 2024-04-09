<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FichefraisSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fichefrais-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idVisiteur') ?>

    <?= $form->field($model, 'mois') ?>

    <?= $form->field($model, 'nbJustificatifs') ?>

    <?= $form->field($model, 'montantValide') ?>

    <?= $form->field($model, 'dateModif') ?>

    <?php // echo $form->field($model, 'idEtat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
