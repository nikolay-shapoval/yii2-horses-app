<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Promers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput()->widget(
        DatePicker::classname(),
        [
            'dateFormat' => 'yyyy-MM-dd',
            'options'    => ['class' => 'form-control'],
        ]
    ) ?>

    <?= $form->field($model, 'horse_id')->dropDownList(
        $horses,
        ['prompt' => '']
    ) ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?= $form->field($model, 'slanting_length')->textInput() ?>

    <?= $form->field($model, 'breast_girth')->textInput() ?>

    <?= $form->field($model, 'mouth_grasp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
