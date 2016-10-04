<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Breeds */

$this->title                   = Yii::t(
        'app',
        'Update {modelClass}: ',
        [
            'modelClass' => 'Breeds',
        ]
    ) . ' ' . $model->breed;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Breeds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->breed, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="breeds-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render(
        '_form',
        [
            'model' => $model,
        ]
    ) ?>

</div>
