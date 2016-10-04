<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OwnersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Owners');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="owners-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add Owner'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'layout' => '{errors} {items} {summary} {pager}',

            'columns'      => [

                'id',
                [
                    'attribute' => 'sale_date',
                    'format'    => 'date',
                    'filter'    => DatePicker::widget(
                        [
                            'model'         => $searchModel,
                            'attribute'     => 'sale_date',
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
                'owner',
                'organization',
                'address',
                [
                    'class'    => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                ],
            ],
        ]
    ); ?>
</div>
