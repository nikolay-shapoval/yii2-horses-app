<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HorsesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $sexs array */

$this->title                   = Yii::t('app', 'Horses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horses-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add Horse'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'layout' => '{errors} {items} {summary} {pager}',
            'columns'      => [
                'id',
                [
                    'attribute' => 'owner_id',
                    'value'     => 'owner.owner',
                ],
                [
                    'attribute' => 'breed_id',
                    'value'     => 'breed.breed',
                ],
                'name',
                [
                    'attribute' => 'sex',
                    'filter'    => $sexs,
                ],
                'colour',
                [
                    'attribute' => 'birthday',
                    'format'    => 'date',
                    'filter'    => DatePicker::widget(
                        [
                            'model'         => $searchModel,
                            'attribute'     => 'birthday',
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
                'father',
                'mother',
                [
                    'class'    => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                ],
            ],
        ]
    ); ?>
</div>
