<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Lignefraisforfait $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lignefraisforfait-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idVisiteur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mois')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idFraisForfait')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantite')->textInput() ?>

    <?= $form->field($model, 'Date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
