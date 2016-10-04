<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PromersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Promers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add Promers'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'layout' => '{errors} {items} {summary} {pager}',
            'columns'      => [
                'id',
                [
                    'attribute' => 'date',
                    'format'    => 'date',
                    'filter'    => DatePicker::widget(
                        [
                            'model'         => $searchModel,
                            'attribute'     => 'date',
                            'options'       => [
                                'class' => 'form-control',
                            ],
                            'clientOptions' => [
                                'format'         => 'dd-mm-yyyy',
                                'autoclose'      => true,
                                'todayHighlight' => true,
                            ],
                        ]
                    ),
                ],
                [
                    'attribute' => 'horse_id',
                    'value'     => 'horse.name',
                ],
                'height',
                'slanting_length',
                 'breast_girth',
                 'mouth_grasp',

                [
                    'class'    => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                ],
            ],
        ]
    ); ?>
</div>
