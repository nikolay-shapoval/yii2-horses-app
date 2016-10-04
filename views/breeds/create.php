<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Breeds */

$this->title                   = Yii::t('app', 'Add Breed');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Breeds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="breeds-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render(
        '_form',
        [
            'model' => $model,
        ]
    ) ?>

</div>
