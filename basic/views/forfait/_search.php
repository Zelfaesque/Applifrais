<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LignefraisforfaitSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lignefraisforfait-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idVisiteur') ?>

    <?= $form->field($model, 'mois') ?>

    <?= $form->field($model, 'idFraisForfait') ?>

    <?= $form->field($model, 'quantite') ?>

    <?= $form->field($model, 'Date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
