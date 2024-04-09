<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Lignefraisforfait $model */
/** @var yii\widgets\ActiveForm $form */

    $fraisForfaits = app\models\FraisForfait::find()->all();

    $listeFraisForfaits = [];
        foreach ($fraisForfaits as $fraisForfait) {
            $listeFraisForfaits[$fraisForfait->id] = $fraisForfait->libelle;
        }
?>

<div class="lignefraisforfait-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idVisiteur')->textInput(['maxlength' => true, 'value' => Yii::$app->user->identity->id, 'readonly' => true]) ?>

    <?= $form->field($model, 'mois')->textInput(['maxlength' => true, 'readonly' => true, 'value' => date('m')]) ?>

    <?= $form->field($model, 'idFraisForfait')->dropDownList($listeFraisForfaits) ?>

    <?= $form->field($model, 'quantite')->textInput() ?>

    <?= $form->field($model, 'Date')->textInput(['type' => 'date', 'min' => date('Y-m-d'), 'max' => date('Y-m-d')]) ?>

    <br>
    <div class="form-group">
        <?= Html::submitButton('Sauvegarder', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
