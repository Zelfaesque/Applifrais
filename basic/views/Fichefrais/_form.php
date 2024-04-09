<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\fichefrais $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fichefrais-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idVisiteur')->textInput(['maxlength' => true, 'value' => Yii::$app->user->identity->id, 'readonly' => true]) ?>

    <?= $form->field($model, 'mois')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'nbJustificatifs')->textInput() ?>

    <?= $form->field($model, 'montantValide')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'dateModif')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'idEtat')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <br>
    <div class="form-group">
        <?= Html::submitButton('Sauvegarder', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
