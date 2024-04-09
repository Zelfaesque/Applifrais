<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Lignehf2Search $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lignehf-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idVisiteur') ?>

    <?= $form->field($model, 'mois') ?>

    <?= $form->field($model, 'libelle') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'montant') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
