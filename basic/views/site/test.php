<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */

use yii\models\Visiteur;

$this->title = 'Visiteur';
?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
<?php endif; ?>

<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4"> Bienvenue <?= Yii::$app->user->identity->prenom ?> <?= Yii::$app->user->identity->nom ?>!</h1>
    </div>
</div>
