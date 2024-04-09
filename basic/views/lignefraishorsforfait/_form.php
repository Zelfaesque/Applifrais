<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Lignefraishorsforfait $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lignefraishorsforfait-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idVisiteur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mois')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'libelle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'montant')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
