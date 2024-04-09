<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Lignehf $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lignehf-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idVisiteur')->textInput(['maxlength' => true, 'value' => Yii::$app->user->identity->id, 'readonly' => true]) ?>

    <?= $form->field($model, 'mois')->textInput(['maxlength' => true, 'readonly' => true, 'value' => date('m')]) ?>

    <?= $form->field($model, 'libelle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput(['type' => 'date', 'min' => date('Y-m-d'), 'max' => date('Y-m-d')]) ?>

    <?= $form->field($model, 'montant')->textInput(['maxlength' => true]) ?>
    <br>
    <?= $form->field($model, 'Justificatifs')->fileInput() ?>

    <br>
    <div class="form-group">
        <?= Html::submitButton('Sauvegarder', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
