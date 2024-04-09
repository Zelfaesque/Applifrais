<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Fichefrais $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fichefrais-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idVisiteur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mois')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nbJustificatifs')->textInput() ?>

    <?= $form->field($model, 'montantValide')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dateModif')->textInput() ?>

    <?= $form->field($model, 'idEtat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
