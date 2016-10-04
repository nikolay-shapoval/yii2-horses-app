<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Descriptions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="descriptions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'horse_id')->dropDownList(
        $horses,
        ['prompt' => '']
    ) ?>

    <?= $form->field($model, 'head')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'neck')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'left_front')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'right_front')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'left_back')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'right_back')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'verification_date')->textInput()->widget(
        DatePicker::classname(),
        [
            'dateFormat' => 'yyyy-MM-dd',
            'options'    => ['class' => 'form-control'],
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
