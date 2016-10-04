<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Owners */

$this->title                   = Yii::t('app', 'Add Owner');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Owners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="owners-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render(
        '_form',
        [
            'model' => $model,
        ]
    ) ?>

</div>
