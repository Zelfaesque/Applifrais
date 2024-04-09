<?php

use app\models\Lignefraishorsforfait;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lignefraishorsforfaits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lignefraishorsforfait-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lignefraishorsforfait', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
        },
    ]) ?>


</div>
