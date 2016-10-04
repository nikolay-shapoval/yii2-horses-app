<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Horses */
/* @var $form yii\widgets\ActiveForm */
/* @var $data array */
?>

<div class="horses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'owner_id')->dropDownList(
        $data['owners'],
        ['prompt' => '']
    ) ?>

    <?= $form->field($model, 'breed_id')->dropDownList(
        $data['breeds'],
        ['prompt' => '']
    ) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->dropDownList(
        $data['sexs'],
        ['prompt' => '']
    ) ?>

    <?= $form->field($model, 'colour')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->textInput()->widget(
        DatePicker::classname(),
        [
            'dateFormat' => 'yyyy-MM-dd',
            'options'    => ['class' => 'form-control'],
        ]
    ) ?>

    <?= $form->field($model, 'father')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mother')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
