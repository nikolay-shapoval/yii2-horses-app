<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Promers */

$this->title                   = Yii::t('app', 'Add Promers');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Promers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render(
        '_form',
        [
            'model' => $model,
            'horses' => $horses
        ]
    ) ?>

</div>
