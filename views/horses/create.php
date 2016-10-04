<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Horses */
/* @var $data array */

$this->title                   = Yii::t('app', 'Add Horse');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Horses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render(
        '_form',
        [
            'model' => $model,
            'data'  => $data,
        ]
    ) ?>

</div>
