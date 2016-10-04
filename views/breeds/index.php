<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BreedsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Breeds');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="breeds-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('app', 'Add Breed'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'layout' => '{errors} {items} {summary} {pager}',
            'columns'      => [
                'id',
                'breed',
                'external_signs:ntext',
                'comments:ntext',
                [
                    'class'    => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                ],
            ],
        ]
    ); ?>

</div>
