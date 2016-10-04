<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DescriptionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Descriptions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="descriptions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add Description'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'layout' => '{errors} {items} {summary} {pager}',
            'columns'      => [
                'id',
                [
                    'attribute' => 'horse_id',
                    'value'     => 'horse.name',
                ],
                'head',
                'neck',
                'left_front',
                'right_front',
                'left_back',
                'right_back',
                'body',
                [
                    'attribute' => 'verification_date',
                    'format'    => 'date',
                    'filter'    => DatePicker::widget(
                        [
                            'model'         => $searchModel,
                            'attribute'     => 'verification_date',
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
                    'class'    => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                ],
            ],
        ]
    ); ?>
</div>
